function div_tab(pic_num){
        var tabPicArr=document.getElementById("tabpic").getElementsByTagName("div");
        for(var i=0;i<tabPicArr.length;i++){
            if(i==pic_num){
                tabPicArr[i].style.display="block";
            } else{
                tabPicArr[i].style.display="none";
            }
        }
}
var i=0;
function auto_tab_div(){
    //如果切换到最后一张图片则重新从一张开始
    if(i>3){
        i=0;
    } 
    div_tab(i);
    i++;
}
 //每三秒调用一次auto_tab_div函数
setInterval("auto_tab_div()",3000);
