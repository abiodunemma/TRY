<?php 


function create_unique_id(){
    $charecters =
    'jhehf24235645yfbhjggutgytgyugugyugcnvmhkgmcncjfkgdhrfjtgm';
    $charecters_length = strlen($charecters);
    $random = '';
    for($i = 0; $i < 20; $i++){
        $random .=$charecters[mt_rand(0, $charecters_length - 1)];
    }
    return $random;
}
 

function show_errors($form_errors_array) {
    $form_errors = array();
    $errors = "<p><ul style ='color: red;'>";
    foreach($form_errors_array as $the_error){
        $errors .= "<li>{$the_error} </li>";
    }
    $errors .= "</ul></p>";
    return $errors;

}


?>