document.addEventListener('DOMContentLoaded', function () {
    let left = document.querySelector('.button-left');
    let right = document.querySelector('.button-right');
    let images = document.querySelector('.images');
    let index = 0;
    let time;

    // 获取轮播图数量
    const total = images.children.length;

    function position() {
        images.style.left = (index * -100) + '%';
    }

    function add() {
        index = (index + 1) % total;
    }

    function desc() {
        index = (index - 1 + total) % total;
    }

    function timer() {
        time = setInterval(() => {
            add();
            position();
        }, 3000);
    }

    left.addEventListener('click', () => {
        clearInterval(time);
        desc();
        position();
        timer();
    });

    right.addEventListener('click', () => {
        clearInterval(time);
        add();
        position();
        timer();
    });

    timer();

    //FLASH DEAL 

  const images2 = [
    'https://picsum.photos/id/1011/200/150',
    'https://picsum.photos/id/1012/200/150',
    'https://picsum.photos/id/1013/200/150',
    'https://picsum.photos/id/1015/200/150',
    'https://picsum.photos/id/1016/200/150',
  ];

  const track = document.getElementById('track');
  const wrapper = track.closest('.carousel-wrapper');
  const itemWidth = 143;
  const visible = 4;
  let index2 = visible;
  let autoScroll;
  let isMoving = false;

  function createItem2(src, discount, now, old) {
    const div = document.createElement('div');
    div.className = 'carousel-item';
    div.innerHTML = `
      <div class="discount">${discount}</div>
      <img src="${src}" loading="lazy" width="120" height="120">
      <p class="price"><span class="now">${now}</span><del>${old}</del></p>
    `;
    return div;
  }

  const originalItems2 = images2.map((src, i) =>
    createItem2(src, `-${10 + i * 5}%`, `AU$ ${1 + i}.00`, `AU$ ${1.5 + i}`)
  );

  const clonedStart2 = originalItems2.slice(-visible).map(el => el.cloneNode(true));
  const clonedEnd2 = originalItems2.slice(0, visible).map(el => el.cloneNode(true));

  clonedStart2.forEach(el => track.appendChild(el));
  originalItems2.forEach(el => track.appendChild(el));
  clonedEnd2.forEach(el => track.appendChild(el));

  function updatePosition2() {
    track.style.transition = 'transform 0.3s ease-in-out';
    track.style.transform = `translateX(-${index2 * itemWidth}px)`;
  }

  function shiftNext2() {
    if (isMoving) return;
    isMoving = true;
    index2++;
    updatePosition2();
  }

  function shiftPrev2() {
    if (isMoving) return;
    isMoving = true;
    index2--;
    updatePosition2();
  }

  track.addEventListener('transitionend', () => {
    if (index2 >= originalItems2.length + visible) {
      track.style.transition = 'none';
      index2 = visible;
      track.style.transform = `translateX(-${index2 * itemWidth}px)`;
    }
    if (index2 < visible) {
      track.style.transition = 'none';
      index2 = originalItems2.length + visible - 1;
      track.style.transform = `translateX(-${index2 * itemWidth}px)`;
    }
    isMoving = false;
  });

  wrapper.querySelector('.carousel-btn.right').addEventListener('click', shiftNext2);
  wrapper.querySelector('.carousel-btn.left').addEventListener('click', shiftPrev2);

  // 初始化位置
  requestAnimationFrame(() => {
    track.style.transform = `translateX(-${index2 * itemWidth}px)`;
  });

  // 自动轮播
  function startAutoScroll2() {
    autoScroll = setInterval(shiftNext2, 3000);
  }

  function stopAutoScroll2() {
    clearInterval(autoScroll);
  }

  wrapper.addEventListener('mouseenter', stopAutoScroll2);
  wrapper.addEventListener('mouseleave', startAutoScroll2);

  startAutoScroll2();


  //   header下标语
  const scrollContent = document.getElementById('scrollContent');
  const items = scrollContent.children;
  const itemHeight = 30;
  let index3 = 0;

  setInterval(() => {
    [...items].forEach(item => item.classList.remove('active'));

    index3++;
    scrollContent.style.transition = 'transform 0.8s cubic-bezier(0.25, 0.8, 0.25, 1)';
    scrollContent.style.transform = `translateY(-${itemHeight * index3}px)`;

    if (index3 === items.length - 1) {
      // 到了假第7行，等待动画结束后立即跳回 index3 = 0
      setTimeout(() => {
        scrollContent.style.transition = 'none';
        scrollContent.style.transform = 'translateY(0)';
        index3 = 0;
        items[0].classList.add('active');
      }, 800); // 和 transition 时间一致
    } else {
      items[index3].classList.add('active');
    }
  }, 2500);

});


// 监听加购行为显示toast
document.addEventListener('DOMContentLoaded', function () {
  jQuery(document.body).on('added_to_cart', function (event, fragments, cart_hash, $button) {
    const toast = document.getElementById('cart-toast');
    if (!toast) return;

    toast.style.display = 'block';
    setTimeout(() => {
      toast.style.display = 'none';
    }, 2000);
  });
});

// 监听加收藏行为显示toast
document.addEventListener('DOMContentLoaded', function () {
  jQuery(document).on('added_to_wishlist', function () {
    const toast = document.getElementById('wishlist-toast');
    if (!toast) return;

    toast.classList.add('show');
    setTimeout(() => {
      toast.classList.remove('show');
    }, 2000); // 2 秒后消失
  });
});


