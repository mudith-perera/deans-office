
(function ($) {
    "use strict";

    
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);

//set usertype variable

function setRoute(userType) {
   // console.log(userType);
    document.getElementById('loginForm').action=`/${userType}`
}


//mudith 5/18/2021 START

$(".alt").click(function() {
    var $row = $(this).closest("tr");
    var $tds = $row.find("td:nth-child(1)");
    var button = document.getElementById("confirm");
    var buttonS =document.getElementById("submit");
    button.style.visibility ="visible";
    buttonS.style.visibility ="hidden";
    $.each($tds, function() {
        document.getElementById("hiddenTxtArea").value = $(this).text();
    });
});

//mudith 5/18/2021 END


// piyumantha 5/19/2021 start

// delete confirm button
let dltBtn = document.getElementById('confirm');

// set date format when deleting the academic data in some views
const getDateFormat = date => {
    var month = (date.getMonth() + 1).toString();
    month = month.length > 1 ? month : '0' + month;
    var day = date.getDate().toString();
    day = day.length > 1 ? day : '0' + day;
    // return month + '/' + day + '/' + date.getFullYear();
    return date.getFullYear() + '-' + month + '-' + day;
}

var dateObj = new Date();


// ##=================== achievement delete start ======================== ##
let achievementInput = document.getElementsByName('achievement_name')[0];

if (achievementInput) {
    
    dltBtn.addEventListener('click', () => {
    
        achievementInput.value = ' ';
    });
}

// console.log(achievementInput.value);

// ##=================== achievement delete end ========================== ##



// ##====================== comittee delete start ======================##
let comitteeInput=document.getElementsByName('Committee_name')[0];
let postInput=document.getElementsByName('post')[0];
let yearInputFrom=document.getElementsByName('year_from')[0];
let yearInputTo = document.getElementsByName('year_to')[0];

if (comitteeInput) {
    
    dltBtn.addEventListener('click', () => {
    
        comitteeInput.value = ' ';
        postInput.value = ' ';
        yearInputFrom.value = 1;
        yearInputTo.value = 2;
    });
}

// console.log({comitteeInput,});

// ##======================= comittee delete end =======================##

// ##=================== community services delete start ======================== ##

let yearInput = document.getElementsByName('year_community')[0];
let descInput = document.getElementsByName('desc_community')[0];

if (yearInput) {
    
    dltBtn.addEventListener('click', () => {
    
        yearInput.value = 1;
        descInput.value = ' ';
    });
}


// ##=================== community services delete end ========================== ##

// ##=================== dissamination of knowledge delete start ======================== ##

let yearInputKnowledge = document.getElementsByName('year_knowledge')[0];
let descKnowledge = document.getElementsByName('desc_knowledge')[0];

if (yearInputKnowledge) {
    
    dltBtn.addEventListener('click', () => {
    
        yearInputKnowledge.value = 1;
        descKnowledge.value = ' ';
    });
}



// ##=================== dissamination of knowledge delete end ========================== ##

// ##=================== publication conference delete start ======================== ##

let paperTitleConference=document.getElementsByName('paper_title_conference')[0];
let paperYearConference=document.getElementsByName('year_conference')[0];
let mainAuthorConference=document.getElementsByName('main_author_conference')[0];

if (paperTitleConference) {
    
    dltBtn.addEventListener('click', () => {
    
        paperTitleConference.value = ' ';
        paperYearConference.value = 1;
        mainAuthorConference.value = ' ';
    });
}



// ##=================== publication conference delete end ========================== ##

// ##=================== publication journal delete start ======================== ##

let paperTitleJournal=document.getElementsByName('paper_title_journal')[0];
let paperYeaJournal=document.getElementsByName('year_journal')[0];
let mainAuthorJournal=document.getElementsByName('main_author_journal')[0];
let journalNameJournal=document.getElementsByName('journal_name')[0];


if (paperTitleJournal && journalNameJournal) {
    
    
    dltBtn.addEventListener('click', () => {
    
        paperTitleJournal.value = ' ';
        paperYeaJournal.value = 1;
        mainAuthorJournal.value = ' ';
        journalNameJournal.value = ' ';
    });
}

// ##=================== publication journal delete end ========================== ##

// ##=================== contribution national level delete start ======================== ##

let yearInputNationalContribute = document.getElementsByName('year_national')[0];
let descInputNationalContribute = document.getElementsByName('desc_national')[0];

if (yearInputNationalContribute) {
    
    dltBtn.addEventListener('click', () => {
    
        yearInputNationalContribute.value = 1;
        descInputNationalContribute.value = ' ';
    });
}


// ##=================== contribution national level delete end ========================== ##


// ##=================== contribution international level delete start ======================== ##

let yearInputInternationalContribute = document.getElementsByName('year_international')[0];
let descInputInternationalContribute = document.getElementsByName('desc_international')[0];

if (yearInputInternationalContribute) {
    
    dltBtn.addEventListener('click',()=>{
    
        yearInputInternationalContribute.value=1;
        descInputInternationalContribute.value=' ';
    })
}


// ##=================== contribution international level delete end ========================== ##



// ##=================== external courses delete start ======================== ##

let courseName=document.getElementsByName('course_nameExternal')[0];
let yearFromExternal=document.getElementsByName('year_externalFrom')[0];
let yearToExternal=document.getElementsByName('year_externalTo')[0];
let yearIntroExternal = document.getElementsByName('year_externalIntro')[0];

if (courseName && yearIntroExternal) {
    
    dltBtn.addEventListener('click',()=>{
    
        courseName.value=' ';
        yearFromExternal.value=getDateFormat(dateObj);
        yearToExternal.value=getDateFormat(dateObj);
        yearIntroExternal.value=1;
    })
}


// ##=================== external courses delete end ========================== ##


// ##=================== course unit delete start ======================== ##

let courseUnitName=document.getElementsByName('unit_name')[0];
let courseUnitCredits=document.getElementsByName('unit_creditAmount')[0];
let courseUnitCode=document.getElementsByName('unit_code')[0];
let courseUnitIntroYear = document.getElementsByName('year')[0];


if (courseUnitName) {

    
    dltBtn.addEventListener('click', () => {
    
        courseUnitName.value = ' ';
        courseUnitCredits.value = 1;
        courseUnitCode.value = ' ';
        courseUnitIntroYear.value = 1;
    });
}



// ##=================== course unit delete end ========================== ##

// ##=================== conducted staff development  delete start ======================== ##

let staffDevConductedName=document.getElementsByName('course_name_staff_conducted')[0];
let staffDevConductedYear=document.getElementsByName('year_staff_conducted')[0];
let staffDevConductedFrom=document.getElementsByName('from_staff_conducted')[0];
let staffDevConductedTo=document.getElementsByName('to_staff_conducted')[0];
let staffDevConductedRole = document.getElementsByName('role_staff_conducted')[0];
let staffDevConductedInstitute = document.getElementsByName('institute')[0];

if (staffDevConductedName) {
    
    dltBtn.addEventListener('click',()=>{
    
        staffDevConductedName.value=' ';
        staffDevConductedYear.value=1;
        staffDevConductedFrom.value=getDateFormat(dateObj);
        staffDevConductedTo.value=getDateFormat(dateObj);
        staffDevConductedRole.value = ' ';
        staffDevConductedInstitute.value = ' ';
    })
}



// ##=================== conducted staff development  delete end ========================== ##


// ##=================== participated staff development  delete start ======================== ##

let staffDevParticipatedName=document.getElementsByName('course_name_staff_participate')[0];
let staffDevParticipatedYear=document.getElementsByName('year_staff_participate')[0];
let staffDevParticipatedFrom=document.getElementsByName('from_staff_participate')[0];
let staffDevParticipatedTo=document.getElementsByName('to_staff_participate')[0];
let staffDevParticipatedInstitute = document.getElementsByName('institute_staff_participate')[0];

if (staffDevParticipatedName) {
    
    dltBtn.addEventListener('click',()=>{
    
        staffDevParticipatedName.value=' ';
        staffDevParticipatedYear.value=1;
        staffDevParticipatedFrom.value=getDateFormat(dateObj);
        staffDevParticipatedTo.value=getDateFormat(dateObj);
        staffDevParticipatedInstitute.value=' ';
    })
}



// ##=================== participated staff development  delete end ========================== ##




// ##=================== outreach delete start ======================== ##

let yearInputOutreach = document.getElementsByName('year_outreach')[0];
let descInputOutreach = document.getElementsByName('desc_outreach')[0];
if (yearInputOutreach) {
    
    dltBtn.addEventListener('click',()=>{
    
        yearInputOutreach.value=1;
        descInputOutreach.value=' ';
    })
}


// ##=================== outreach delete end ========================== ##



// ##=================== grant delete start ======================== ##

let grantName=document.getElementsByName('grant_name')[0];
let grantAmount=document.getElementsByName('grant_amount')[0];
let grantRole = document.getElementsByName('grant_role')[0];

if (grantName) {
    
    dltBtn.addEventListener('click',()=>{
    
        grantName.value=' ';
        grantAmount.value=1;
        grantRole.value=' ';
    })
}


// ##=================== grant delete end ========================== ##



// ##=================== events conducted delete start ======================== ##

let eventName=document.getElementsByName('event_name')[0];
let eventDate=document.getElementsByName('event_date')[0];
let eventRole = document.getElementsByName('event_role')[0];

dltBtn.addEventListener('click',()=>{

    eventName.value=' ';
    eventDate.value=getDateFormat(dateObj);
    eventRole.value=' ';
})


// ##=================== events conducted delete end ========================== ##







// piyumantha 5/19/2021 end