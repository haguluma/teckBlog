$(function(){

});

//記事編集画面
function md_confirm (){
  var $cf_btn = $("#confirm_btn");
  var $textarea = $("#md_textarea");

  var $cf_area = $("#md_confirm");
  if ( $cf_btn.text() == "Confirm" ){
    $textarea.css({display : 'none'});
    $cf_area.css({display: ''});
    $cf_btn.text("Back");
    var formatted = marked( $textarea.val() );
    console.log(formatted);
    $cf_area.html(formatted);
  } else {
    $textarea.css({display: ''});
    $cf_area.css({display: 'none'});
    $cf_btn.text("Confirm");
  }
}

function add_tag (){
  var $tag_list = $("#art_taglist");
  var $tags = $tag_list.children();
  var $tag_selecter = $("#art_tagselecter");
  var $selected_tag = $tag_selecter.val();
  //console.log($selected_tag);

  for (var i = 0; i < $tags.length; i++){
    //console.log($tags.eq(i).attr('value'));
    if ($selected_tag  == $tags.eq(i).attr('value')) return;
  }

  var $tag_block = $("<li>");
  $tag_block.text($selected_tag).append("<div class='tag_close' onclick='delete_tag()'>×</div>").attr('value',$selected_tag);
  $tag_list.append($tag_block);
  change_tag ();
}

function delete_tag (){
  $(".tag_close").click(function(){
    $(this).parent().remove();
    change_tag ();
  });
}

function change_tag (){
  var $article_tags = $('#article_tags');
  var $tag_list = "";
  var $tags = $("#art_taglist").children();
  $tags.each(function(i, elem){
    if ($tag_list != "") $tag_list += ',';
    $tag_list += $(elem).attr('value');
  });
  $('#article_tags').val($tag_list);
    console.log($('#article_tags').val());
}
