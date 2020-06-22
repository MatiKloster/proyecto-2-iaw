$(document).ready(function(){

    $('.col-4-lg').hover(
        // trigger when mouse hover
        function(){
            $(this).animate({
                marginTop: "-=1%",
            },200);
        },

        // trigger when mouse out
        function(){
            $(this).animate({
                marginTop: "0%"
            },200);
        }
    );
});
function checkInput(){
        var input=document.getElementById('inputSearch');
        input.value=input.value.trim();
}