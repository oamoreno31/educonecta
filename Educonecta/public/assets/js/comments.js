$("#reply_comment").on("show.bs.modal", function (event) {
    console.log("entro")
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var modal = $(this);
    modal.find(".comments_id").val(id);
});
