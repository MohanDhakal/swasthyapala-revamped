function deletePost(id) {
    // console.log(id);
    var url = '/posts/'.concat(id);
    console.log(url);
    $.ajax({
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'DELETE', // post.destroy
        success: function (result) {
            location.reload(true);
        }
    });

}
