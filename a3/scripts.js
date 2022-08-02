let dayTime = null;
let fullprice = 0;
let discountprice = 0;
let total =0;
const seating = [];
let checkedName =null;
let checkedEmail = null;
let checkedPhone = null;



window.onload=function(){
   
    let error = document.getElementById("Target");
    if(error != null){
       validateForm();
    }


   //var radios = document.getElementsByName('day');
   
   if (document.querySelector('input[name="day"]')) {
    document.querySelectorAll('input[name="day"]').forEach((elem) => {
      elem.addEventListener("change", function(event) {
        dayTime = JSON.parse(event.target.value);
        console.log("changed");
    
         day = dayTime.day;
         time = dayTime.time;
         calculatePrice(dayTime, seating);

      });
    });

    var seats2 = document.querySelector('select[name="seat"]');
    console.log(seats2);
    

    var email = document.getElementById("user[Email]");
    email.addEventListener('input', function() {
         checkedEmail = checkEmail(email.value);
    });

    var Name = document.getElementById("user[Name]");
    Name.addEventListener('input', function(){
        checkedName = checkName(Name.value);    
    });

    var phone = document.getElementById("user[mobile_number]");
    phone.addEventListener('input', function(){
         checkedPhone = checkPhone(phone.value);
    
    })

  }
    

  var seats = document.getElementById("seatForm");

    seats.addEventListener("change", function(event) {
     
         fullPrice = event.target.getAttribute("data-fullprice");
         discPrice = event.target.getAttribute("data-discprice");    

        var matchFound = false;
      
        if(seating.length != 0){
            for(i=0; i<seating.length; i++){
                
                if(seating[i].getAttribute("name").toString() == event.target.getAttribute("name").toString()){
                    
                    seating[i] = event.target;
                    matchFound = true;
                }
            }
            if(!matchFound){
                seating.push(event.target);
            }
        
        } else{
            seating.push(event.target);
        }

        ///console.log(seating);
    calculatePrice(dayTime, seating);
         
    });

}

    function checkSeats(seats){
        var formatted = false;
        if(seats.length != 0){
           
            formatted = true;
            for(i=0; i< seats.length; i++){
              
        }
        console.log("seats"+formatted);
        return formatted;
    }
    }

    function checkDayTime(dayTime){

    }


    function calculatePrice(dayTime_arr, seats){

        if(dayTime_arr != null && seats.length != 0){
        let day = dayTime_arr.day;
        let time = dayTime_arr.time;
        let price = 0;
    
        
       // monday price calculation, discounts are all day
       if(day == 'Monday'){
            for(i=0; i<seats.length; i++){
               price += (seats[i].getAttribute("data-discprice") * seats[i].value);
            }

    // this outer else if statement is used to calculate the price on weekdays excluding monday
       } else if (day != 'Saturday' && day != 'Sunday' && day != 'Monday'){

        // if statement will trigger if the movie showing time is after or at 12PM
           if(time === 1200){

            for(i=0; i<seats.length; i++){
                price += (seats[i].getAttribute("data-discprice") * seats[i].value);
             }

        // else statement will trigger for every other time, eg 8AM wednesday
           } else{

            for(i=0; i<seats.length; i++){
                price += (seats[i].getAttribute("data-fullprice") * seats[i].value);
             }

           }
       }
       // this else statement will pretty much only trigger if it is the weekend
       else{

        for(i=0; i<seats.length; i++){
            price += (seats[i].getAttribute("data-fullprice") * seats[i].value);
         }

       }
     
            document.getElementById("price").innerHTML = '$'+price;
        }
    }
    
    function validateForm(){
        var validated = true;
        console.log("validating");
        if(!checkName(document.getElementById("user[Name]").value)){
            validated = false;
            document.getElementById("nameError").innerHTML = "Your Name must be filled"; 
        }

         if(!checkEmail(email = document.getElementById("user[Email]").value)){
            validated = false;
            document.getElementById("emailError").innerHTML = "Your Email must be filled";
        }

        if(!checkPhone(document.getElementById("user[mobile_number]").value)){
            validated = false;
            document.getElementById("phoneError").innerHTML = "Your Phone Number must be filled";    
        }

        if(!checkSeats(document.getElementById("seatForm"))){
            validated = false;
            document.getElementById("seatingError").innerHTML = "You must select at least one seat";
        }

        if(dayTime == null){
            validated = false;
            document.getElementById("dayTimeError").innerHTML = "Please select one of the options below:";
        }


        if(validated){
            document.querySelector("#seatForm").disabled = false;
        }
        else{
            document.querySelector("#seatForm").disabled = true;
        }
        return validated;
    }


function checkEmail(email) {
    
    var formatted = false;
    var regex = /\S+@\S+\.\S+/;

        if(regex.test(email)){
            formatted = true;
        }
    return formatted
}

function checkName(Name){
   
    var regex = /^[a-zA-Z]+$/;
    var formatted = false;

    // makes sure the name value is not null 
    if (Name.value !== null || Name.value !== " " ){

        // makies the name value longer than 3 digits and does not contain any other vlaues such as * @ # %
        if( Name.length >= 3 && Name.match(regex)){
            formatted = true;
        }     
    }

    return formatted;
}


function checkPhone(phone){
    // regex forces user to enter in an australian mobile number starting in 04
        var regex = /^\(04\)|04|[0-9]+$/;
        var formatted = false;

        if(phone.length ==10 && phone.match(regex)){
            formatted = true;      
        }

        else{
            formatted =  false;
        }
 
        return formatted;
}




