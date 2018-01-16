<?php




function action_index(){
    echo "Main Controller page";


    RenderView('View_MainPage',[]);
}

function action_leaveComment(){

require_once ROOT.'/core/models/Leave_comment.php';





    RenderView('View_leaveComment',$errors);


}

function action_showComment(){




    RenderView('View_showComment',[]);

}

