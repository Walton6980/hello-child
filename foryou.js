jQuery(document).ready(function ($) {
    $('.fy-3').click(function () {
      let category = $(this).data('category');
  
      // 切换类目高亮状态
      $('.fy-3').removeClass('active');
      $(this).addClass('active');
  
      // 发起 AJAX 请求
      $.ajax({
        url: foryou_ajax.ajax_url,
        type: 'POST',
        data: {
          action: 'load_products_by_category',
          category: category
        },
        beforeSend: function () {
          $('#ajax-product-grid').html('<p>Loading...</p>');
        },
        success: function (response) {
          $('#ajax-product-grid').html(response);
        },
        error: function () {
          $('#ajax-product-grid').html('<p>Error loading products.</p>');
        }
      });
    });
  
    // 默认点击 “All Categories”
    $('.fy-3[data-category="all-categories"]').trigger('click');
  });
  