$(document).ready(function(){
    $('#name').on('input', function(){
        $('#startGame').removeClass('disabled');
        if($('#name').val()=="")
        {
            $('#startGame').addClass('disabled');
        }
    });

    $('#startGame').on("click",function(){
        startGame()
    });

    var oneSecInterval;
    var user_score=[0,0,0,0,0,0,0,0,0,0];
    var final_score=0;
    var temp,highest_number,timeCounter=0;
    moles="";
    var scorecard = document.getElementById('score');
    var timer = document.getElementById('timer');
    var name = document.getElementById('name').value;
    function change(mole_number){
        var img = document.getElementById(mole_number);
        if(img.src != './images/mole.png')
        {
            img.src = "./images/mole.png";
            user_score[--mole_number]++;
            final_score++;
            var scorecard = document.getElementById('score');
            scorecard.innerHTML=final_score;
        }
    }
    function setActiveMole(mole_number){

        $(".active-mole").removeClass("active-mole");
        $("#" + mole_number).addClass("active-mole");

    }

    function startGame()
    {
        if(document.getElementById('name').value=="")
            return;
        scorecard.innerHTML=0;
        timer.innerHTML=20;
        final_score=0;
        temp=0;
        moles="";
        user_score=[0,0,0,0,0,0,0,0,0];
        highest_number=0;

        $('#stopGame').removeClass('disabled');
        $("#startGame").addClass("disabled");
        oneSecInterval = setInterval(function(){
            setActiveMole(Math.floor(Math.random()*9))
            timer.innerHTML = timer.innerHTML-1;
            if(timer.innerHTML==0)
            {
                clearInterval(oneSecInterval);
                gameEnded();
            }
        },1000);
    }

    function gameEnded(){
        timer.innerHTML = 'Game Over';
        $('.active-mole').removeClass('active-mole');        
        
        var name = $('#name').val();

        alert(name+" Your total score is: " + final_score);
        
        $.ajax({
                type: "POST",                
                url: "database_entry.php",
                data: {name:name,final_score1:final_score},
                success: function(data) {
                             location.reload();
                    }
                });
                
    }
    $('#stopGame').on('click', function(event){
        clearInterval(oneSecInterval);
        gameEnded();
        $(this).addClass("disabled");
    })

    $(".mole").on("click",function(event){
        if($(this).hasClass("active-mole")){
            var moleIndex = $(this).attr("id");

            $(this).removeClass("active-mole");

            user_score[moleIndex-1]++;
            final_score++;
            
            scorecard.innerHTML = final_score;
        }
    });
});