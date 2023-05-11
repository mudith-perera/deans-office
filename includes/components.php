<?php

function panelButton($class,$text,$name,$icon,$url){
echo '
                <button class="btn  p-4 w-50 my-2 '.$class.'" style="border-radius:25px" name="'.$name.' " onclick="document.location.href='.$url.' " >
                    <h4>'.$text.' <br> <i class="'.$icon.'"   ></i> </h4>
                </button>

';
}

function inputField($type,$name,$placeholder,$value,$property){
    
    echo '
    <input type="'.$type.'" class="form-control w-100  rounded-pill text-center" '.$property.' name="'.$name.'" value="'.$value.'"
    placeholder="'.$placeholder.'" autocomplete="off"  required   style="height:45px;font-weight:bold;" >
    
    ';
}

function label($for,$text){
    echo '
    <label for="'.$for.'" class="col-form-label">'.$text.' : </label>
    ';
}
function labelForCheckBox($for,$text,$class){
    echo '
    <label for="'.$for.'" class="'.$class.'">'.$text.' : </label>
    ';
}

function dropdownHead($placeholder,$name,$id,$status,$value){
    echo '
    
    <div class="row text-center justify-content-center">
    <input type="text" placeholder="'.$placeholder.'" name="'.$name.'" value="'.$value.'" id="'.$id.'"   class="text-center mx-2"
        style="border-radius:25px;display:inline; width:55%; height:45px;" readonly>
    <div class="dropdown text-center">
        <button class="btn btn-success dropdown-toggle ml-2 text-center" type="button"
            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"
            style="border-radius:25px;display:inline; height:45px; width:100%;" '.$status.'>
            <h6 class="mx-4" style="display:inline;">Select</h6>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        
    
    ';
}
function dropdownFooter(){
    echo '
    
    
            
        </div>

    </div>
</div>
    ';
}

function textarea($name,$cols,$rows,$text,$property){
    echo '
    <textarea name="'.$name.'" id="" cols="'.$cols.'" rows="'.$rows.'" class="form-control text-center" placeholder="'.$text.'"
                        style="border-radius:25px;font-weight:bold;" '.$property.'></textarea>
    ';
}

function customRadioButton($text,$name,$property,$value){
    echo '<label class="container w-25">'.$text.'
    <input type="radio"  name="'.$name.'" value="'.$value.'" '.$property.'>
    <span class="checkmark"></span>
</label>';
}

function submitButton($name,$icon,$btnText){
    echo '
    <button class="btn btn-success rounded-pill w-100 mt-4 " name="'.$name.'" type="submit">
                        <h5 class="">'.$btnText.' <i class="'.$icon.' mx-2"></i></h5>
                    </button>
    ';
}

function resetButton($name,$icon,$btnText){
    echo '
    <button class="btn btn-danger rounded-pill w-100 mt-4" name="'.$name.'" type="reset">
                        <h5>'.$btnText.' <i class="'.$icon.' mx-2"></i></h5>
                    </button>
    ';
}

function searchButton($name){
    echo '
    <button class="btn btn-success rounded-pill w-100" name="'.$name.'" type="submit">
    <h5>Search <i class="fas fa-search"></i></h5>
    </button>
    ';
}

function tableRow($no,$name,$id,$email,$epf,$address,$mobile){
    echo '
    <tr>
    <th scope="row">'.$no.'</th>
    <td>'.$name.'</td>
    <td>'.$id.'</td>
    <td>'.$email.'</td>
    <td>'.$epf.'</td>
    <td>'.$address.'</td>
    <td>'.$mobile.'</td>
</tr>
    ';
}

function tableHistoryRow($no,$desc,$year){
echo '
    <tr>
        <th>'.$no.'</th>
        <td>'.$desc.'</td>
        <td>'.$year.'</td>
    </tr>
';
}

// Acadamic data table render functions START

//=========== Achievement table start =================
function achievementTableHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Description</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
    ';
}
function achievementTableHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">User\'s Name</th>
                                <th scope="col">Achievement Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Description</th>
                                
                            </tr>
                        </thead>
    ';
}

function achievementTableRow($name,$type,$desc){
    echo '<tr>
    <td>'.$name.'</td>
    <td>'.$type.'</td>
    <td>'.$desc.'</td>
    <td>edit</td>

</tr>';
}
function achievementTableRowReport($user_name,$name,$type,$desc){
    echo '<tr>
    <td>'.$user_name.'</td>
    <td>'.$name.'</td>
    <td>'.$type.'</td>
    <td>'.$desc.'</td>

</tr>';
}

//=========== Achievement table ENd =================

//=========== Commities table start =================
function committeTableHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Post</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Description</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function committeTableHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">User\'s Name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Post</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
    ';
}

function committeTableRow($name,$post,$from,$to,$desc){
    echo '<tr>
    <td>'.$name.'</td>
    <td>'.$post.'</td>
    <td>'.$from.'</td>
    <td>'.$to.'</td>
    <td>'.$desc.'</td>
    <td>edit</td>

</tr>';
}
function committeTableRowReport($user_name,$name,$post,$from,$to,$desc){
    echo '<tr>
    <td>'.$user_name.'</td>
    <td>'.$name.'</td>
    <td>'.$post.'</td>
    <td>'.$from.'</td>
    <td>'.$to.'</td>
    <td>'.$desc.'</td>

</tr>';
}

//=========== Commities table ENd =================

//=========== community services table start =================
function communityServicesHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">Activity</th>
                                <th scope="col">Year</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function communityServicesHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">User\'s Name</th>
                                <th scope="col">Activity</th>
                                <th scope="col">Year</th>
                            </tr>
                        </thead>
    ';
}

function communityServicesRow($activity,$year){
    echo '<tr>
    <td>'.$activity.'</td>
    <td>'.$year.'</td>
    <td>edit</td>

</tr>';
}
function communityServicesRowReport($user_name,$activity,$year){
    echo '<tr>
    <td>'.$user_name.'</td>
    <td>'.$activity.'</td>
    <td>'.$year.'</td>

</tr>';
}

//=========== community services table ENd =================

//===========  dissamination knowledge table start =================
function dissminationKnowledgeHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">Activity</th>
                                <th scope="col">Year</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function dissminationKnowledgeHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">User\'s Name</th>
                                <th scope="col">Activity</th>
                                <th scope="col">Year</th>
                            </tr>
                        </thead>
    ';
}

function dissminationKnowledgeRow($activity,$year){
    echo '<tr>
    <td>'.$activity.'</td>
    <td>'.$year.'</td>
    <td>edit</td>

</tr>';
}
function dissminationKnowledgeRowReport($user_name,$activity,$year){
    echo '<tr>
    <td>'.$user_name.'</td>
    <td>'.$activity.'</td>
    <td>'.$year.'</td>

</tr>';
}

//=========== dissamination knowledge  table ENd =================

//=========== publication conference table start =================
function publicationConferenceHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Year</th>
                                <th scope="col">Main Author</th>
                                <th scope="col">Co Authors</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function publicationConferenceHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">User\'s Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Year</th>
                                <th scope="col">Main Author</th>
                                <th scope="col">Co Authors</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
    ';
}

function publicationConferenceRow($title,$year,$mainAuthor,$coAuthors,$type,$status){
    echo '<tr>
    <td>'.$title.'</td>
    <td>'.$year.'</td>
    <td>'.$mainAuthor.'</td>
    <td>'.$coAuthors.'</td>
    <td>'.$type.'</td>
    <td>'.$status.'</td>
    <td>edit</td>
    
</tr>';
}
function publicationConferenceRowReport($user_name,$title,$year,$mainAuthor,$coAuthors,$type,$status){
    echo '<tr>
    <td>'.$user_name.'</td>
    <td>'.$title.'</td>
    <td>'.$year.'</td>
    <td>'.$mainAuthor.'</td>
    <td>'.$coAuthors.'</td>
    <td>'.$type.'</td>
    <td>'.$status.'</td>
    
</tr>';
}

//=========== publication conference  table ENd =================

//=========== publication journal table start =================
function publicationJournalHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Year</th>
                                <th scope="col">Main Author</th>
                                <th scope="col">Co Authors</th>
                                <th scope="col">Journal Name</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function publicationJournalHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                                <th scope="col">User\'s Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Year</th>
                                <th scope="col">Main Author</th>
                                <th scope="col">Co Authors</th>
                                <th scope="col">Journal Name</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
    ';
}

function publicationJournalRow($title,$year,$mainAuthor,$coAuthors,$jName,$status){
    echo '<tr>
    <td>'.$title.'</td>
    <td>'.$year.'</td>
    <td>'.$mainAuthor.'</td>
    <td>'.$coAuthors.'</td>
    <td>'.$jName.'</td>
    <td>'.$status.'</td>
    <td>edit</td>
    
</tr>';
}
function publicationJournalRowReport($user_name,$title,$year,$mainAuthor,$coAuthors,$jName,$status){
    echo '<tr>
    <td>'.$user_name.'</td>
    <td>'.$title.'</td>
    <td>'.$year.'</td>
    <td>'.$mainAuthor.'</td>
    <td>'.$coAuthors.'</td>
    <td>'.$jName.'</td>
    <td>'.$status.'</td>
    
</tr>';
}

//=========== publication journal  table ENd =================

//=========== contribution national table start =================
function contributionNationalHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">Activity</th>
                            <th scope="col">Year</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function contributionNationalHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">User\'s Name</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Year</th>
                            </tr>
                        </thead>
    ';
}

function contributionNationalRow($activity,$year){
    echo '<tr>
    <td>'.$activity.'</td>
    <td>'.$year.'</td>
    <td>edit</td>
    
</tr>';
}
function contributionNationalRowReport($user_name,$activity,$year){
    echo '<tr>
    <td>'.$user_name.'</td>
    <td>'.$activity.'</td>
    <td>'.$year.'</td>
    
</tr>';
}

//=========== contribution national  table ENd =================

//=========== contribution international table start =================
function contributionInterNationalHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">Activity</th>
                            <th scope="col">Year</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function contributionInterNationalHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">User</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Year</th>
                            </tr>
                        </thead>
    ';
}

function contributionInterNationalRow($activity,$year){
    echo '<tr>
    <td>'.$activity.'</td>
    <td>'.$year.'</td>
    <td>edit</td>
    
</tr>';
}
function contributionInterNationalRowReport($user,$activity,$year){
    echo '<tr>
    <td>'.$user.'</td>
    <td>'.$activity.'</td>
    <td>'.$year.'</td>
    
</tr>';
}

//=========== contribution international  table ENd =================

//=========== External courses table start =================
function externalCoursesHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Intro Year</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Audience</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function externalCoursesHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">User</th>
                            <th scope="col">Name</th>
                            <th scope="col">Intro Year</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Audience</th>
                            </tr>
                        </thead>
    ';
}

function externalCoursesRow($name,$year,$from,$to,$audience){
    echo '<tr>
    <td>'.$name.'</td>
    <td>'.$year.'</td>
    <td>'.$from.'</td>
    <td>'.$to.'</td>
    <td>'.$audience.'</td>
    <td>edit</td>
    
</tr>';
}
function externalCoursesRowReport($user,$name,$year,$from,$to,$audience){
    echo '<tr>
    <td>'.$user.'</td>
    <td>'.$name.'</td>
    <td>'.$year.'</td>
    <td>'.$from.'</td>
    <td>'.$to.'</td>
    <td>'.$audience.'</td>
    
</tr>';
}

//=========== External courses  table ENd =================

//===========  introduced course unit table start =================
function courseUnitsHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Credit</th>
                            <th scope="col">Code</th>
                            <th scope="col">Type</th>
                            <th scope="col">Introduced Year</th>
                            <th scope="col">Description</th>
                            <th scope="col">Benifisheries</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function courseUnitsHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">User</th>
                            <th scope="col">Name</th>
                            <th scope="col">Credit</th>
                            <th scope="col">Code</th>
                            <th scope="col">Type</th>
                            <th scope="col">Introduced Year</th>
                            <th scope="col">Description</th>
                            <th scope="col">Benifisheries</th>
                            </tr>
                        </thead>
    ';
}

function courseUnitsRow($name,$credit,$code,$type,$introYear,$desc,$benifisheries){
    echo '<tr>
    <td>'.$name.'</td>
    <td>'.$credit.'</td>
    <td>'.$code.'</td>
    <td>'.$type.'</td>
    <td>'.$introYear.'</td>
    <td>'.$desc.'</td>
    <td>'.$benifisheries.'</td>
    <td>edit</td>
    
</tr>';
}
function courseUnitsRowReport($user,$name,$credit,$code,$type,$introYear,$desc,$benifisheries){
    echo '<tr>
    <td>'.$user.'</td>
    <td>'.$name.'</td>
    <td>'.$credit.'</td>
    <td>'.$code.'</td>
    <td>'.$type.'</td>
    <td>'.$introYear.'</td>
    <td>'.$desc.'</td>
    <td>'.$benifisheries.'</td>
    
</tr>';
}

//===========  introduced course unit  table ENd =================

//===========  conducted staff dev  table start =================
function conductedStaffDevHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Year</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Role </th>
                            <th scope="col">Type</th>
                            <th scope="col">Institute</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function conductedStaffDevHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">User</th>
                            <th scope="col">Name</th>
                            <th scope="col">Year</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Role </th>
                            <th scope="col">Type</th>
                            <th scope="col">Institute</th>
                            </tr>
                        </thead>
    ';
}

function conductedStaffDevRow($name,$year,$from,$to,$role,$type,$institute){
    echo '<tr>
    <td>'.$name.'</td>
    <td>'.$year.'</td>
    <td>'.$from.'</td>
    <td>'.$to.'</td>
    <td>'.$role.'</td>
    <td>'.$type.'</td>
    <td>'.$institute.'</td>
    <td>edit</td>
    
</tr>';
}
function conductedStaffDevRowReport($user,$name,$year,$from,$to,$role,$type,$institute){
    echo '<tr>
    <td>'.$user.'</td>
    <td>'.$name.'</td>
    <td>'.$year.'</td>
    <td>'.$from.'</td>
    <td>'.$to.'</td>
    <td>'.$role.'</td>
    <td>'.$type.'</td>
    <td>'.$institute.'</td>
    
</tr>';
}

//===========  conducted staff dev   table ENd =================

//===========  participated staff dev  table start =================
function participatedStaffDevHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Year</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Type</th>
                            <th scope="col">Institute</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function participatedStaffDevHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">User</th>
                            <th scope="col">Name</th>
                            <th scope="col">Year</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Type</th>
                            <th scope="col">Institute</th>
                            </tr>
                        </thead>
    ';
}

function participatedStaffDevRow($name,$year,$from,$to,$type,$institute){
    echo '<tr>
    <td>'.$name.'</td>
    <td>'.$year.'</td>
    <td>'.$from.'</td>
    <td>'.$to.'</td>
    <td>'.$type.'</td>
    <td>'.$institute.'</td>
    <td>edit</td>
    
</tr>';
}
function participatedStaffDevRowReport($user,$name,$year,$from,$to,$type,$institute){
    echo '<tr>
    <td>'.$user.'</td>
    <td>'.$name.'</td>
    <td>'.$year.'</td>
    <td>'.$from.'</td>
    <td>'.$to.'</td>
    <td>'.$type.'</td>
    <td>'.$institute.'</td>
    
</tr>';
}

//===========  participated staff dev   table ENd =================

//===========  grant table start =================
function grantsHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Role</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Benifisharies</th>
                            <th scope="col">Type</th>
                            <th scope="col">Other</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function grantsHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">User</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Role</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Benifisharies</th>
                            <th scope="col">Type</th>
                            <th scope="col">Other</th>
                            </tr>
                        </thead>
    ';
}

function grantsRow($name,$amount,$role,$purpose,$benifisharies,$type,$other){
    echo '<tr>
    <td>'.$name.'</td>
    <td>'.$amount.'</td>
    <td>'.$role.'</td>
    <td>'.$purpose.'</td>
    <td>'.$benifisharies.'</td>
    <td>'.$type.'</td>
    <td>'.$other.'</td>
    <td>edit</td>
    
</tr>';
}
function grantsRowReport($user,$name,$amount,$role,$purpose,$benifisharies,$type,$other){
    echo '<tr>
    <td>'.$user.'</td>
    <td>'.$name.'</td>
    <td>'.$amount.'</td>
    <td>'.$role.'</td>
    <td>'.$purpose.'</td>
    <td>'.$benifisharies.'</td>
    <td>'.$type.'</td>
    <td>'.$other.'</td>
    
</tr>';
}

//===========  grant table ENd =================

//===========  events conducted table start =================
function eventsConductedHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Event-Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">Type</th>
                            <th scope="col">Role</th>
                            <th scope="col">Desc</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function eventsConductedHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">User</th>
                            <th scope="col">Name</th>
                            <th scope="col">Event-Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">Type</th>
                            <th scope="col">Role</th>
                            <th scope="col">Desc</th>
                            </tr>
                        </thead>
    ';
}

function eventsConductedRow($name,$eventType,$date,$type,$role,$desc){
    echo '<tr>
    <td>'.$name.'</td>
    <td>'.$eventType.'</td>
    <td>'.$date.'</td>
    <td>'.$type.'</td>
    <td>'.$role.'</td>
    <td>'.$desc.'</td>
    <td>edit</td>
    
</tr>';
}
function eventsConductedRowReport($user,$name,$eventType,$date,$type,$role,$desc){
    echo '<tr>
    <td>'.$user.'</td>
    <td>'.$name.'</td>
    <td>'.$eventType.'</td>
    <td>'.$date.'</td>
    <td>'.$type.'</td>
    <td>'.$role.'</td>
    <td>'.$desc.'</td>
    
</tr>';
}

//===========  events conducted table ENd =================


//=========== outreach activities table start =================
function outreachHead(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">Activity</th>
                            <th scope="col">Year</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
    ';
}
function outreachHeadReport(){
    echo '
    <thead class=" bg-success text-light">
                            <tr>
                            <th scope="col">User</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Year</th>
                            </tr>
                        </thead>
    ';
}

function outreachRow($activity,$year){
    echo '<tr>
    <td>'.$activity.'</td>
    <td>'.$year.'</td>
    <td>edit</td>
    
</tr>';
}
function outreachRowReport($user,$activity,$year){
    echo '<tr>
    <td>'.$user.'</td>
    <td>'.$activity.'</td>
    <td>'.$year.'</td>
    
</tr>';
}

//=========== outreach activities  table ENd =================

// Acadamic data table render functions END


?>