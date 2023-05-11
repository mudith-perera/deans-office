//5/21/2021 Mudith Perera

// commits
Achievements done in academic details (ther is a hidden text box to set data)
Acaden=mic Details Crud operations are done

//24/6/2021 Piyumantha
Reports home page created.
Reports view page created.

// bugs found in front-end
> back button is not working in achievements.php *(Fixed. automatically 😅)
> In Some pages of "Academic Details", "Submit" button getting missplaced . *(Fixed)
> "View Academic Details" option must be removed from "menu.php" *(Fixed)
> "function textarea($name,$cols,$rows,$text,$property)" must be changed as the value should hold as a place holder not as a text *(Fixed)

//Major bugs found in front-end
> In "conferencePublicationDetails.php" drop down is not working. * (Fixed: 2021/06/03 -> changed variable name)
> Error when deleting a record in "journalPublicationDetails.php" (asking a value for "journal name") (NOTE: Delete function is working when we give a value to "Journal name") * (Fixed: 2021/06/03 -> changed variable names)
> Error when deleting a record in "externalCourses.php" (asking a value for "Time Period") (NOTE: Delete function is not working even if we give a value to "Time Period") *(Fixed: 2021/06/03 -> changed the date format to "yyyy-mm-dd")
> Error when deleting a record in "newlyIntroducedCourses.php" * (Fixed: 2021/06/03 -> changed variable names)
> Error when deleting a record in "staffDevelopmentConducted.php" * (Fixed: 2021/06/03 -> changed variable names)
> Error when deleting a record in "staffDevelopmentParticipation.php" * (Fixed: 2021/06/03 -> changed variable names)
> Error when deleting a record in "eventsConductedorOragnized.php"  * (Fixed: 2021/06/03 -> changed variable names)

//Solution for the bug
Something do with the main.js file code parts for not deleting error

// password reset need to fix!!
// conference publication status need to change to indexed or non-indexed
// report date validation
// add user validations, (cannot add more than 1 dean, 6 deptHeads, 2 dept heads to same dept)
