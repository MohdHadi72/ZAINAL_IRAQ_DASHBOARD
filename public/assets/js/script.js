function project(id) {
    $.ajax({
        type: "get",
        url: "{{ url('get-project') }}/" + id,
        cache: false,
        success: function(data) {
            $('#zone').val(data.zone);
        }
    });

}