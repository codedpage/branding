<?php

    if(isset($_POST['timeZone']) && $_POST['timeZone'] != '') {
        echo "here";die;
        $newTimeZone = sanitize_text_field($_POST['timeZone']);
        echo getDateMeetings(date("Y-m-d"), $newTimeZone);
    }

    function getDateMeetings($selectedDate, $userTimeZone) {
        $upload_arr= wp_upload_dir();
        $upload_dir_url = $upload_arr['baseurl'];
        
        if(isset($selectedDate) && $selectedDate != '') {
            $selectedDate = sanitize_text_field(trim($selectedDate));             
            global $wpdb;
            $optionName = 'liveVideoMeetings_' . $selectedDate;
            $results = $wpdb->get_results("select * from wp_options where option_name='$optionName'");

            if(count($results) == 0) {
                // call API
                $str_post = "a=websiteapi.get_live_meetings"
                    . "&username=recoverycentral"
                    . "&authtoken=010de989dc0407626277e245bddbd00b9fbf71f6";
                $endpoint = 'https://api.intherooms.com/main.php';

                $ch = @curl_init();
                @curl_setopt($ch, CURLOPT_POST, true);
                @curl_setopt($ch, CURLOPT_POSTFIELDS, $str_post);
                @curl_setopt($ch, CURLOPT_URL, $endpoint);
                @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                @curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/x-www-form-urlencoded'
                ));
                $responseJson = @curl_exec($ch);
                @curl_close($ch);
                $responseArray = json_decode($responseJson, true);
                if($responseArray['response']['success'] == 0) {
                    return 'Server error'; // Login Credentials failed
                } else if($responseArray['response']['status'] == 1) {
                    $data = $responseArray['response']['response_message']['data'];
                    $arr = json_encode($data);                        
                    $wpdb->insert(
                        'wp_options', 
                        array(
                            'option_name' => 'liveVideoMeetings_' . $selectedDate,
                            'option_value' => $arr,
                        )
                    );
                }
            } else {
                $results = (array) $results;
                $data = json_decode($results[0]->option_value, true);
            }            
            
            // get all the fellowship dropdown
            /*foreach($data as $value) {
                $meetingFellowshipArray[] = $value['fellowship'];
            }
            $meetingFellowshipArray = array_values(array_unique($meetingFellowshipArray));
            sort($meetingFellowshipArray);*/
            
            $fellowShipFilters = array(
                "Alcoholics_Anonymous" => array("ALCOHOLICS_ANONYMOUS"),
                "Narcotics_Anonymous" => array("NARCOTICS_ANONYMOUS"),
                "Specialty_Meetings" => array("11TH_STEP_MEDITATION_","CHEMSEX","CODEPENDENCY_GRIEF_AND_RELATIONSHIPS","HEALTHY_LOVE","SEX_TALK","SEX_&_ADDICTION","SHE_RECOVERS","SOUL_RECOVERY_W/_ESTER_NICHOLSON","WOMEN_IN_RECOVERY","SPIRITUAL_GANGSTERS_[MENS_GROUP]","TRAUMA_&_RECOVERY","YOGA_RECOVERY","LIFE_RECOVERY[FAITH_BASED]"),
                "Others" => array(''),
            );

            $html = '';
            /*$html .= '<div class="col-md-12">
                        <div style="text-align:center;">
                            <img src="https://www.intherooms.com/home/wp-content/uploads/2020/02/add-size-728x90.jpg">
                        </div>
                    </div>';*/
            $html .= '<div class="col-md-12">
                <div class="vmc-hdg-pnl">
                    <h2>Live Video Meetings Calendar</h2>
                    <select class="fellowshipDropDown">
                        <option value="">Filter by Fellowship</option>';
            foreach($fellowShipFilters as $key => $value) {
                    $fellowshipName = str_replace ("_", " ", $key);
                    $html .= '<option value="' . $key . '">' . $fellowshipName . '</option>';
                }
            $html .= '</select>
                </div>
            </div>';
            
            $date = new DateTime("now", new DateTimeZone($userTimeZone));            
            $html .= '<div class="col-md-12">
                    Current Calendar Timezone Setting : ' . $userTimeZone . '
                    [<a onclick=changeTimeZone("Europe/London");>edit]</a><br>
                    Your local Time : ' . $date->format('h:i A') . '                
                </div>';
            
                /*for($i = 0; $i <count($meetingFellowshipArray); $i++) {
                    $fellowshipName = str_replace ("_", " ", $meetingFellowshipArray[$i]);
                    $html .= '<option value="'.$meetingFellowshipArray[$i].'">' . $fellowshipName . '</option>';
                }*/
            /* get all the fellowship dropdown */

            
            /* convert New York Time to user time zone */
            $newData = array();
            foreach($data as $value) {
                $date = new DateTime($value['meeting_date'], new DateTimeZone('America/New_York'));
                $date->setTimezone(new DateTimeZone($userTimeZone));
                $value['userLocalDateTime'] = $date->format('Y-m-d H:i:s');
                $newData[] = $value;
            }
            //echo "<pre>";print_r($newData);die;
            /* convert New York time to user time zone */
            
            /* get all the dates data in Array */
            $allDatesData = array();
            foreach($newData as $value) {
                $meetingDate = substr($value['userLocalDateTime'], 0, 10);
                $meetingTime = substr($value['userLocalDateTime'], 11, 5);
                $allDatesData[$meetingDate][$meetingTime][] = $value;
            }
            /* get all the dates data in Array */
            

            /* create date slider*/
            $html .= '<div class="col-md-12"> 
                <section class="center slider mb-5">';
                foreach($allDatesData as $key => $value) {
                    $activeClass = '';
                    if($key == date('Y-m-d')) {
                        $activeClass = ' active';
                    }
                    $html .= '<div class="dateRange" id="dateRange_'.$key.'">' . 
                        date("D", strtotime($key)) . 
                        '<a id ="'.$key.'" class="dateCircle cld-min" style="cursor: pointer;margin: auto;">
                            <div id ="roundChild_'.$key.'" class="cld-crl'.$activeClass.'">' . 
                                date("M", strtotime($key)) . '<br>
                                <strong class="cld-date-sz">' . date("d", strtotime($key)). '</strong>
                            </div>
                        </a>
                    </div>';
                }
            $html .= '</section>
                </div>';
            /* create date slider*/
            

            /* show all the dates data */
            foreach($allDatesData as $key1 => $value1) {
                if($key1 == date('Y-m-d')) {
                    $displayClass = 'show';
                } else {
                    $displayClass = 'hide';
                }
                $html .= '<div class="meetingList col-md-12 ' . $displayClass . '" id="meetingList_'.$key1.'"><div class="ue-cld-list">';
                $html .= '<div id="meetingListMessage_' . $key1 . '" style="display:none;">No meetings found.</div>';
                $html .= '<div id="meetingListHeading_' . $key1 . '" style="font-weight: bold;">
                            <div class="ue-cld-list-pnl clearfix"> 
                                <div class="ue-s-date">Time</div>
                                <div class="ue-s-detail">Fellowship</div>
                                <div class="ue-s-detail-sub">Meeting Name</div>
                            </div>
                        </div>';
                foreach($value1 as $key => $value) {

                    if(count($value) > 1) {
                        for($i=0;$i<count($value);$i++) {
                            $meetingDate = substr($value[$i]['userLocalDateTime'], 0, 10);
                            $meetingTime = substr($value[$i]['userLocalDateTime'], 11, 5);
                            $meetingTimeFormat = date('h:i A', strtotime($value[$i]['userLocalDateTime']));
                            $finishTime = date('h:i A',strtotime('+1 hour',strtotime($value[$i]['userLocalDateTime'])));
                            
                            $date = new DateTime("now");
                            $date->setTimezone(new DateTimeZone($userTimeZone));
                            $currentTime = $date->format('h:i A');
                            if (strtotime($currentTime) > strtotime($meetingTimeFormat) && strtotime($currentTime) < strtotime($finishTime)) {
                                $meetingInSession = "Yes";
                                $liveMeeting = 'live_meeting';
                            } else {
                                $meetingInSession = "No";
                                $liveMeeting = '';
                            }

                            $output = str_replace(array('[', ']'), '_', $value[$i]['fellowship']);
                            $key = searchForId($value[$i]['fellowship'], $fellowShipFilters);

                            $fellowshipName = str_replace ("_", " ", $value[$i]['fellowship']);
                            
                            $html .= '<div class="'.$key1.'_child fellowship fellowship_'.$key.'">';
                            $html .= '<a class="' . $liveMeeting . '" target="_blank" href="https://www.intherooms.com/livemeetings/view?meeting_id=' . $value[$i]['meeting_id'] . '">';
                            
                            if($i == 0) {
                                $html .= '<div class="ue-cld-list-pnl clearfix" data-href="#" style="border-bottom:none; !important"> 
                                            <div class="ue-s-date">' . $meetingTimeFormat . '</div>';                                            
                            } else if($i == (count($value) - 1)) {
                                $html .= '<div class="ue-cld-list-pnl clearfix" data-href="#">
                                            <div class="ue-s-date timeComplete1 timeComplete1_'.$meetingDate.'" style="display:none;">' . $meetingTimeFormat . '</div>
                                            <div class="ue-s-date timeComplete2 timeComplete2_'.$meetingDate.'">&nbsp;</div>';
                            } else {
                                $html .= '<div class="ue-cld-list-pnl clearfix" data-href="#" style="border-bottom:none; !important">
                                            <div class="ue-s-date timeComplete1 timeComplete1_'.$meetingDate.'" style="display:none;">' . $meetingTimeFormat . '</div>
                                            <div class="ue-s-date timeComplete2 timeComplete2_'.$meetingDate.'">&nbsp;</div>';
                            }
                            $html .= '      <div class="ue-s-detail">' . $fellowshipName . '</div>
                                            <div class="ue-s-detail-sub">' . $value[$i]['name'] . '</div>
                                        </div>
                                    </a>';
                            
                            if($value[$i]['special_meeting'] == 1 && $value[$i]['special_meeting_page_url'] != '') {
                                $html .= '<div class="meeting-info">';
                                $html .= '<a target="_blank" href="' . $value[$i]['special_meeting_page_url'] . '">
                                    <i class="fa fa-info-circle fa-2" aria-hidden="true" style="margin-left:5px;"></i>
                                </a></div>';
                            }
                            $html .= '</div>';
                        }
                    } else {
                        $meetingDate = substr($value[0]['userLocalDateTime'], 0, 10);
                        $meetingTime = substr($value[0]['userLocalDateTime'], 11, 5);
                        $meetingTimeFormat = date('h:i A', strtotime($value[0]['userLocalDateTime']));
                        $finishTime = date('h:i A',strtotime('+1 hour',strtotime($value[0]['userLocalDateTime'])));
                        
                        
                        $date = new DateTime("now");
                        $date->setTimezone(new DateTimeZone($userTimeZone));
                        $currentTime = $date->format('h:i A');
                        //$currentTime = '08:50 PM';
                        if (strtotime($currentTime) > strtotime($meetingTimeFormat) && strtotime($currentTime) < strtotime($finishTime)) {
                            $meetingInSession = "Yes";
                            $liveMeeting = 'live_meeting';
                        } else {
                            $meetingInSession = "No";
                            $liveMeeting = '';
                        }
                        
                        $output = str_replace(array('[', ']'), '_', $value[0]['fellowship']);
                        $key = searchForId($value[0]['fellowship'], $fellowShipFilters);
                        $fellowshipName = str_replace ("_", " ", $value[0]['fellowship']);
                        
                        $html .= '<div class="'.$key1.'_child fellowship fellowship_'.$key.'">';
                        $html .= '<a class="' . $liveMeeting . '" target="_blank" href="https://www.intherooms.com/livemeetings/view?meeting_id=' . $value[0]['meeting_id'] . '">
                            <div class="ue-cld-list-pnl clearfix" data-href="#"> 
                                <div class="ue-s-date">' . $meetingTimeFormat . '</div>
                                <div class="ue-s-detail">' . $fellowshipName . '</div>
                                <div class="ue-s-detail-sub">' . $value[0]['name'] . '</div>
                            </div>
                        </a>';
                        if($value[0]['special_meeting'] == 1 && $value[0]['special_meeting_page_url'] != '') {
                            $html .= '<div class="meeting-info">';
                            $html .= '<a target="_blank" href="' . $value[0]['special_meeting_page_url'] . '">
                                <i class="fa fa-info-circle fa-2" aria-hidden="true" style="margin-left:5px;"></i>
                            </a></div>';
                        }
                        $html .= '</div>';
                    }
                }
                $html .= '</div></div>';
            }
            /* show all the dates data */            
            
            return $html;            
        }
    }
    
    function searchForId($searchValue, $array) {
        foreach ($array as $key => $val) {
            if (in_array($searchValue, $val)) {
                return $key;
            }
        }
        return 'others';
    }