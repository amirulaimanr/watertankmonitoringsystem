FusionCharts.ready(function(){
			var chartObj = new FusionCharts({
    type: 'cylinder',
    dataFormat: 'json',
    renderAt: 'chart-container',
    width: '305',
    height: '430',
    dataSource: {
        "chart": {
            "theme": "fusion",
            "caption": "",
            "subcaption": "",
            "lowerLimit": "0",
            "upperLimit": "3",
            "lowerLimitDisplay": "Empty",
            "upperLimitDisplay": "Full",
            "numberSuffix": " ltrs",
            "showValue": "1",
            "chartBottomMargin": "0",
            "chartTopMargin": "100",
            "showValue": "0",
			"dataStreamUrl": "../watertank/read_data.php?widget=tank_animation",
			"refreshInterval": "1",
			"refreshInstantly": "1",
			"cylFillColor": "#35d1fd",
			"cyloriginx": "125",
			"cyloriginy": "350",
			"cylradius": "120",
			"cylheight": "280",
            "canvasbgAlpha": "0",
            "legendBgAlpha":"0"
            
        },
        "value": "6",
        "annotations": {
            "origw": "400",
            "origh": "400",
            "autoscale": "1",
            "groups": [{
                "id": "range",
                "items": [{
                    "id": "rangeBg",
                    "type": "rectangle",
                    "x": "$canvasCenterX-35",
                    "y": "$chartEndY-40",
                    "tox": "$canvasCenterX +55",
                    "toy": "$chartEndY-80",
                    "fillcolor": "#35d1fd"
                }, {
                    "id": "rangeText",
                    "type": "Text",
                    "fontSize": "15",
                    "fillcolor": "#333333",
                    "text": "Loading...",
                    "x": "$chartCenterX-30",
                    "y": "$chartEndY-60"
                }]
            }]
        }

    },
    "events": {
        "rendered": function(evtObj, argObj) {
            //35d1fc   blue color
            //var fuelVolume = 110;
            evtObj.sender.chartInterval = setInterval(function() {
                //(fuelVolume < 10) ? (fuelVolume = 80) : "";
                //var consVolume = fuelVolume - (Math.floor(Math.random() * 3));
                //evtObj.sender.feedData && evtObj.sender.feedData("&value=" + consVolume);
               // fuelVolume = consVolume;
			    evtObj.sender.feedData && evtObj.sender.feedData("&value=");
            }, 2000);
        },
        //Using real time update event to update the annotation
        //showing available volume of Diesel
        "realTimeUpdateComplete": function(evt, arg) {
            var annotations = evt.sender.annotations,
                dataVal = evt.sender.getData(),
                colorVal = (dataVal >= 3) ? "#6caa03" : ((dataVal <= 1) ? "#e44b02" : "#f8bd1b");
            //Updating value
            annotations && annotations.update('rangeText', {
                "text": dataVal + " ltrs"
            });
            //Changing background color as per value
            annotations && annotations.update('rangeBg', {
                "fillcolor": colorVal
            });

        },
        "disposed": function(evt, arg) {
            clearInterval(evt.sender.chartInterval);
        }
    }
}
);
			chartObj.render();
		});