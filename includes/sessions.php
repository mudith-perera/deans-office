<?php 

session_start();
function SuccessMessage(){
    if (isset($_SESSION['SuccessMessage'])){
        
        $output='
        <script>
        
        swal({
            title: "Success!",
            text: "'.$_SESSION['SuccessMessage'].'",
            icon: "success",
            button: "Close",
          });
        </script>

        ';
        $_SESSION['SuccessMessage']=null;
        return $output;
    }
}


function AlertOnDeletion(){
    
        
        $output='
        <script>
        
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                console.log("item deleted")
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Your imaginary file is safe!");
            }
          });
        </script>

        ';
        $_SESSION['deleteUser']=true;
        return $output;
    
}



function ErrorMessage(){
    if (isset($_SESSION['ErrorMessage'])){
       
        $output='
        <script>
        
        swal({
            title: "Error!",
            text: "'.$_SESSION['ErrorMessage'].'",
            icon: "error",
            button: "Close",
          });
        </script>

        ';
        $_SESSION['ErrorMessage']=null;
        return $output;
    }
}



?>