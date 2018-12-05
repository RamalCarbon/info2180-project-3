/*window.onload = () =>{
    var title = document.getElementById("title");
    var description = document.getElementById("description");
    var company = document.getElementById("company");
    var location = document.getElementById("location");
    
    const submit_btn = document.getElementById("submit");
    

    submit_btn.addEventListener("click", submission);
    
     function clear(){
        title.classList.remove("valid", "invalid"); 
        description.classList.remove("valid", "invalid"); 
        company.classList.remove("valid", "invalid"); 
        location.classList.remove("valid", "invalid"); 
        
    }

    function submission(e){
        clear();
        e.preventDefault();
        if(validation()){
            alert("Invalid submission");
        }
        else{
            alert("Valid submission");
        }
        
    }

    function validation(){
        var empty = false;
        
        if (title.value.length === 0) {
            invalid(title);
            empty = true;
        } 
        
        if (description.value.length === 0) {
            invalid(description);
            empty = true;
        }
        
        if (company.value.length === 0) {
            invalid(company);
            empty = true;
        } 
        
        if (location.value.length === 0) {
            invalid(location);
            empty = true;
        } 
        
        
        return empty;
    
        
        

    function invalid(cls) {
        if(!(cls.classList.contains("invalid"))) {
            cls.classList.add("invalid");
        }
    }
    
    function valid(cls) {
       if(!(cls.classList.contains("valid"))) {
            cls.classList.add("valid");
        }
    }
    
  
    
    }}