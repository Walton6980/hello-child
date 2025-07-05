jQuery(document).ready(function ($) {
  $('.fy-3').click(function () {
    let category = $(this).data('category');

    // 切换类目高亮状态
    $('.fy-3').removeClass('active');
    $(this).addClass('active');

    // AJAX 请求
    $.ajax({
      url: foryou_ajax.ajax_url,
      type: 'POST',
      data: {
        action: 'load_products_by_category',
        category: category
      },
      beforeSend: function () {
        // 插入骨架卡
        let skeletonHtml = '';
        for (let i = 0; i < 8; i++) {
          skeletonHtml += `
          
            <div class="fg-g-i skeleton">
              <a href="#">
                <div class="skeleton-img" style="width: 100%; height: 180px;"></div>
              </a>

              <a href="#">
                <span class="fg-title">
                  <span class="skeleton-line title"></span>
                </span>
              </a>

              <span class="fg-price">
                <span class="skeleton-line price"></span>
              </span>

              <div class="shierpx">
                <span class="skeleton-line short" style="width: 60%;"></span>
              </div>

              <div class="shierpx">
                <div class="skeleton-line short" style="width: 45%;"></div>
                <div class="skeleton-line short" style="width: 45%;"></div>
              </div>

              
            </div>
          
          

          `;
        }
        $('#ajax-product-grid').html(skeletonHtml);
      },
      success: function (response) {
        $('#ajax-product-grid').html(response);
      },
      error: function () {
        $('#ajax-product-grid').html('<p>Error loading products.</p>');
      }
    });
  });

  // 默认点击“全部分类”
  $('.fy-3[data-category="all-categories"]').trigger('click');
});
