function preview_image(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('img-src');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

$(document).ready(function(){
    $('#name').on('input', function() {
        var content = this.value;
        $('#name-pre').text(content);
    });
    $('#email').on('input', function() {
        var content = this.value;
        $('#email-pre').text(content);
    });
    $('#text').on('input', function() {
        $('#text-pre').text('');
        var content = this.value;
        $('#text-pre').text(content);
    });
});
