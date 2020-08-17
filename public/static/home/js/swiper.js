	$(document).ready(function(){
var swiper1 = new Swiper('.swiper-container1', {
			loop: true,
			paceBetween: 30,
			pagination: {
				el: '.swiper-pagination1',
				clickable: true,
			},
			//     autoplay:true,//等同于以下设置
			autoplay: {
				delay: 5000,
				stopOnLastSlide: false,
				disableOnInteraction: true,
			},
		});
		
		var swiper2 = new Swiper('.swiper-container2', {
			slidesPerView: 3,
			spaceBetween: 50,
			slidesPerGroup: 3,
			loop: true,
			// loopFillGroupWithBlank: true,
			pagination: {
				el: '.swiper-pagination2',
				clickable: true,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});

	
		$(window).scroll(function(){
		 //创建一个变量存储当前窗口下移的高度
		var scroTop = $(window).scrollTop();
		//判断当前窗口滚动高度
		//如果大于100，则显示顶部元素，否则隐藏顶部元素
		if(scroTop>500){
			$('.returntop').fadeIn(500);
		}else{
			$('.returntop').fadeOut(500);
		}
		});
		    	
	//为返回顶部元素添加点击事件
	$('#returntop').click(function(){
		//将当前窗口的内容区滚动高度改为0，即顶部
		var bodyHeight = $(window).scrollTop()
		var setTime = setInterval(function() {
			bodyHeight = bodyHeight-50
            var top3 = $(window).scrollTop(bodyHeight);//window对象不能执行animate
			if (bodyHeight <= 0) {
				clearInterval(setTime)
			}
		}, 2)

	});
	
	
	
});