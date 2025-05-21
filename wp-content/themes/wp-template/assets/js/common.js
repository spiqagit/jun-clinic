//jQuery contents
jQuery(function () {
  //burger menu
  $('.js_burger').click(function() {
    $('body').toggleClass('is_menu_active');
    $('.js_burger_item').fadeToggle();
  });
  
  //accordion
  $('.js_acc_ttl').click(function() {
    $(this).toggleClass('is_active');
    $(this).next().slideToggle('is_active');
  });
  
  //tab
  $("document").ready(function(){
    $(".js_tab_item").hide();
    $(".js_tab_item:first").show();
  });

  $(".js_tab_btn li").click(function() {
    $(".js_tab_item").hide();
    var activeTab = $(this).attr("rel");
    $("#"+activeTab).fadeIn();
    $(".js_tab_btn li").removeClass("is_active");
    $(this).addClass("is_active");
  });
});
