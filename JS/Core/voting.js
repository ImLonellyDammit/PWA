$(document).ready(function(){

    // Variables related to index.php
    let form = $('#ajax-form');
    let formMessages = $('#form-messages');
    let Video = $("#video");
    let endContainer = $("#ending-container");

    // Variables related to voting.php
    let votingButton = $("#voting-btn");
    let contentContainer = $("#content-container");
    let sourceSave;
   
    // When we close the votes
    $(form).submit(function(){

        // Reset video properties
        $(endContainer).css("display","none");
        $(Video).attr("controls","");
        
        event.preventDefault();
        var formData = $(form).serialize();

        $.ajax({
           type: 'POST',
           url:$(form).attr('action'),
           data: {
               formData,
               aVideo: $("#video source").attr("src"),
               option1text: $("#opt1").text(),
               option2text: $("#opt2").text()
            }
        })
        .done(function(response){   
            // Change the video 
            $(Video).html(response);
            $(Video)[0].load(); 
            // Update the current video status on the database
            $.get("PHP/submitsettings.php");
        })
        .fail(function(data) {      
            alert("An Error Occured!");
        });
    });

    // When the video ends
    $(Video).on('ended',function(){

        let source = $("#video source").attr("src");       
        if(source != "Media/v2.mp4") // Condição que exclui os videos finais
        {        
            $(endContainer).css("display","block");
            $(Video).attr("controls","none");
        }

        let result1;
        let result2;
        let result3;
        let result4;
        $.when(
            // Question Load
            $.ajax({
                type:'POST',
                url: "PHP/questions.php",
                data: {aSource:$("#video source").attr("src")} 
            })
            .done(function(response){
                result1 = response;
            }),
    
            // Video Status Insertion
            $.ajax({
                type:'POST',
                url: "PHP/votingsettings.php",
                data: {aSource:$("#video source").attr("src")}
            })
            .done(function(response){
                result2 = response;
            }),
            
            // Question: Option Count retrieve - OP1
            // Executes the needed queries for the first option every 2 seconds 
            setInterval(function(){
                $.ajax({
                    type: 'POST',
                    url: "PHP/votingretrieve.php"
                })
                .done(function(response){
                    result3 = response;
                })
            },2000),

            // Question: Option Count retrieve - OP2
            // Executes the needed queries for the second option every 2 seconds 
            setInterval(function(){
                $.ajax({
                    type: 'POST',
                    url: "PHP/votingretrieve2.php"
                })
                .done(function(response){
                    result4 = response;
                })
            },2000)

        ).then(function(){
            $("#labels-container").html(result1);
            // Updates the value of both options every 2 seconds  
            setInterval(function(){$('#opt1').text(result3 + "%");$('#opt2').text(result4 + "%");},2000);
        });
        
    });

    // Voting Content -> voting.php - APP PWA
    $(votingButton).click(function(){
        $.ajax({
            type:'GET',
            url:"PHP/votingcheck.php"
        })
        .done(function(response){
            // Avoid p from being repeated
            if (!$(contentContainer).find("#once").html())   
                $(contentContainer).prepend(response);
            setTimeout(function(){$("#content-container #once").remove();},3000);
            
            // Find in the html if there's any #exist id after the recent prepend
            let htmlFiltered = $(contentContainer).find("#exist").html();
            if (htmlFiltered != undefined)
                $("#voting-btn").attr("disabled"," ");

            // Voting buttons after generated
            let btnOptCheck = [$("#opt1btn"),$("#opt2btn")];
            $(btnOptCheck).each(function(i){
                $(btnOptCheck)[i].click(function(){
                    // Inserts the voting line in the database
                    $.post("PHP/votingcount.php",{
                        clickedBtn: $(this).text(), // Choosen option by the click of the button
                        //fp: $('#fingerprint').html()
                        fp: uid // Fingerprint
                    },function(data){
                        // Vote Notification
                        $(contentContainer).append(data);
                    }); 
                    // Main Page Redirect
                    setTimeout(function(){$('body').load("voting.php");},2000);
                });         
            });
        });
    });

});