$(function() {  
        var sHeight = $("#slider").height(); //获取焦点图的宽度（显示面积）  
        var len = $("#slider ul li").length; //获取焦点图个数  
        var index = 0;  
        var picTimer;  
          
     
        var btn = "<div ></div><div class='btn'>";  
        for(var i=0; i < len; i++) {  
		    j=i+1;
            btn += "<span>"+j+"</span>";  
        }  
        btn += "</div>";  
        $("#info").append(btn);  
       
      
        //为小按钮添加鼠标滑入事件，以显示相应的内容  
        $("#info .btn span").css("opacity",0.8).mouseenter(function() {  
            index = $("#info .btn span").index(this);  
            showPics(index);  
			
        }).eq(0).trigger("mouseenter");  
      
       
      
        //本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度  
        $("#slider ul").css("height",sHeight * (len));  
          
        //鼠标滑上焦点图时停止自动播放，滑出时开始自动播放  
        $("#slider").hover(function() {  
            clearInterval(picTimer);  
        },function() {  
            picTimer = setInterval(function() {  
                showPics(index);  
                index++;  
                if(index == len) {index = 0;}  
            },4000); //此4000代表自动播放的间隔，单位：毫秒  
        }).trigger("mouseleave");  
          
        //显示图片函数，根据接收的index值显示相应的内容  
        function showPics(index) { //普通切换  
            var nowHeight = -index*sHeight; //根据index值计算ul元素的left值  
            $("#slider ul").stop(true,false).animate({"top":nowHeight},300); //通过animate()调整ul元素滚动到计算出的position  
            //$("#slider .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果  
            $("#info .btn span").stop(true,false).animate({"opacity":"0.8"},300).eq(index).stop(true,false).animate({"opacity":"0.5"},300); //为当前的按钮切换到选中的效果 
			var title=$("#slider li img").eq(index).attr("title");
			$("#title").html(title);
        }  
		
    });  
      