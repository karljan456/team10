<script>
$("#toggleTheme").on('change', function() {
    if($(this).is(':checked')) {
        $(this).attr('value', 'true');
        document.cookie = "theme=dark";
        location.reload();
    } else {
        $(this).attr('value', 'false');
        document.cookie = 'theme=; Max-Age=0';
        location.reload();
    }
});
</script>