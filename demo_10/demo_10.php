<!DOCTYPE html>
<html>
    <head>
        <script>
            var validate=true;
            var eleCount = 1;

            function onSubmit(){
                var validate=true;
                if(document.getElementById('name').value==""){
                    validate=false;
                }else if(document.getElementById('url').value==""){
                    validate=false;
                }else if(document.getElementById('funnel').value==""){
                    validate=false;
                }else if(document.getElementById('email').value==""){
                    validate=false;
                }else if(document.getElementById('password').value==""){
                    validate=false;
                }else if(document.getElementById('confirmPassword').value==""){
                    validate=false;
                }else if(document.getElementById('password').value != document.getElementById('confirmPassword').value){
                    alert("confirm password is not same as password.");
                    validate=false ;
                }
                var allEle = document.getElementsByClassName("numberOfMembers");
                Array.from(allEle).forEach(myFunction);
                var allEle1 = document.getElementsByClassName("percentage");
                Array.from(allEle1).forEach(myFunction1); 
        
                if(validate==false){
                    alert("please fill all fields.");
                    return false;
                }else{
                    return true;
                }
            }
            function myFunction(item) {
                if(item.value==""){
                    validate=false;
                }
            }
            function myFunction1(item) {
                if(item.value==""){
                    validate=false;
                }
            }           
            function function1(){
                const node=document.getElementById("input");
                const clone=node.cloneNode(true);
                clone.setAttribute('id', 'input'+eleCount);
                clone.querySelectorAll('input')[1].value="";
                clone.querySelectorAll('input')[0].value="";
                clone.querySelector("button").setAttribute('onclick','function2(this)')
                clone.querySelector("button").innerHTML="-";
                document.getElementById("mainInput").appendChild(clone);
                eleCount++;
            }
            function function2(element){
                const parent=document.getElementById('mainInput');
                const child=element.parentElement;
                parent.removeChild(child); 
            }
        </script> 
        <style>
            input {
                margin: 3px;
            }
        </style>
    </head>
    <body>
        <form action="save.php" method="post" onsubmit="return onSubmit();">
            <div style="width: 24%;text-align:right">
                Name <input type="text" name="name" id="name"><br>
                URL <input type="url" name="url" id="url"><br>
                Funnel <input type="text" name="funnel" id="funnel"><br>
                Email <input type="email" name="email" id="email"><br>
                Password <input type="password" name="password" id="password"><br>
                Confirm Password <input type="password" id="confirmPassword"><br>
            </div>
            <div id="mainInput">
                    <div id="input">
                        Number of members <input type="number" name="number_of_members[]" class="numberOfMembers" >
                        Percentage <input type="number" name="percentage[]" class="percentage" >
                        <button type="button" onclick="function1()">+</button>
                    </div>
            </div>
            <input type="submit" name="submit">
            <input type="button" value="Cancel">    
        </form>
    </body>
</html>