var map = new BMap.Map("container");

        var point = new BMap.Point(114.440534, 30.450955);    //默认当前位置(经维度)

        var marker = new BMap.Marker(point);         //标记点

        var opts = {

            width: 250,     // 信息窗口宽度  

            height: 100,      // 信息窗口高度  

            title: "当前地址"      // 信息窗口标题  
        }

        var infoWindow = new BMap.InfoWindow("天津南开区华苑产业园榕苑路天发科技园6号楼5F(501~504)", opts);      // 创建信息窗口对象

        

        marker.addEventListener("dragend", function (e) {        //dragend拖拽停止事件

            point = new BMap.Point(e.point.lng, e.point.lat);       //标记坐标（拖拽以后的坐标）

            marker = new BMap.Marker(point);       //标记点

            var aa = e.point.lng;      //获取经度

            var bb = e.point.lat;      //获取纬度

            infoWindow = new BMap.InfoWindow("当前位置<br />经度：" + aa + "<br />纬度：" + bb, opts);

            map.openInfoWindow(infoWindow, point);      // 在标记点处打开信息窗口
        })

          

        map.addControl(new BMap.NavigationControl());       //打开左上角控件

        map.addControl(new BMap.MapTypeControl());          //打开右上角控件

        map.addControl(new BMap.ScaleControl());            //打开左下角控件

        map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));  //打开右下角缩小框



        map.enableScrollWheelZoom();        //滚动放大

        map.centerAndZoom(point, 13);       //绘制地图  13是地图的大小

        map.addOverlay(marker);        //添加标记点

        marker.enableDragging();      //启用标记点拖拽

        map.openInfoWindow(infoWindow, point);      // 在标记点处打开信息窗口



        //搜索地址
        var localSearch = new BMap.LocalSearch(map);

        function searchByStationName() {

            map.clearOverlays();    //清空原来的标注

            var keyword = document.getElementById("text").value;

            localSearch.setSearchCompleteCallback(function (searchResult) {

                var poi = searchResult.getPoi(0);     //创建一个点

                map.centerAndZoom(poi.point, 13);     //绘制地图  15是地图的大小

                // 创建标注，要查询的地方对应的经纬度
                marker = new BMap.Marker(new BMap.Point(poi.point.lng, poi.point.lat));  

                map.addOverlay(marker);    //添加标记点

                marker.setAnimation(BMAP_ANIMATION_BOUNCE);   //跳动的动画
            });

            localSearch.search(keyword);    //搜索关键字地址
        }