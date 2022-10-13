    $.widget("custom.myWidget",{
        options:{
            defaultValue:0,
        },

        _create:function(event,ui){
            this.element.val(this.options.defaultValue);
            this.element.addClass( "numberInput" );
            
            this._on(this.element,{
                "focus":function(event){
                    this._generateHtml(this);
                },
            });
            
        },

        _generateHtml:function(abc){
            $("#mainSpan").remove();
            $("#minusButton").unbind();
            $("#plusButton").unbind();
            $(document).unbind("click");

            $(abc.element).after('<span id="mainSpan">'
                +'<button id="minusButton">-</button>'
                +'<input id="inputDisplay" disabled>'
                +'<button id="plusButton">+</button>'+'</span>');

            $(abc.element).val(abc.options.defaultValue);
            $("#inputDisplay").val(abc.options.defaultValue);

            $("#minusButton").click(function(){
                abc.options.defaultValue--;
                $("#inputDisplay").val(abc.options.defaultValue);
            })
            $("#plusButton").click(function(){
                abc.options.defaultValue++;
                $("#inputDisplay").val(abc.options.defaultValue);
            });

            $(document).click(function(event) {
                var container = $(".mainDiv");
                if (!container.is(event.target) && !container.has(event.target).length) {
                    $(abc.element).val($("#inputDisplay").val());                    
                    $("#mainSpan").fadeOut();
                }
            });  
        },     
    });

