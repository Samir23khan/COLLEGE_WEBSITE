import $ from "jquery"

class Search{
    //1.describe and create/initiate obejct
    constructor(){
        this.openButton=$(".js-search-trigger");
        this.closeButton=$(".search-overlay__close");
        this.searchOverlay=$(".search-overlay");
        this.isOverlayOpen =false;
        this.searchField = $("#search-term");
        this.resultsDiv =$("#search-overlay__results"); 
        this.typingTimer;
        this.isSpinnerVisible = false;
        this.previousValue;
         this.events();
    }

    //2.events
events(){
    this.openButton.on("click",this.openOverlay.bind(this));
    this.closeButton.on("click",this.closeOverlay.bind(this));
    $(document).on("keyup",this.keyPressDispatcher.bind(this));
    this.searchField.on("keyup",this.searchlogic.bind(this));
  }
// 3. methods

searchlogic(){
if(this.searchField.val()=! this.previousValue ){
   clearTimeout(this.typingTimer);

 if(this.searchField.val()){
    if(!this.isSpinnerVisible ){
        this.resultsDiv.html('<div class="spinner-loader"></div');
        this.isSpinnerVisible = true;
    }
    this.typingTimer =  setTimeout(this.fetchResults.bind(this),2000);
}else{
        this.resultsDiv.html('');
       this.isSpinnerVisible= false;
    }
 this.previousvalue = this.searchField.val();
 } 
    this.previousvalue = this.searchField.val();
}



fetchResults(){
     $.getJSON('http://poornima-university.local/wp-json/wp/v2/posts?search=' + this.searchField.val(),function(result){
      this.resultsDiv.html(' <h2 class="search-overlay__section-title">General Information</h2> 
      <ul class="link-list min-list">
         ${result.map(item => '<li><a href="${item.link}">${item.title.rendered}</a></li>').join("")}
      </ul>');
    }.bind(this)) 



    $.getJSON('http://poornima-university.local/wp-json/wp/v2/posts?search=' + this.searchField.val(),result =>{
        this.resultsDiv.html(` <h2 class="search-overlay__section-title">General Information</h2>
       ${result.length ? <ul class="link-list min-list">' : '<p>Could not find any information to search critersis</p>' 
      
       ${result.map(item => '<li><a href="${item.link}">${item.title.rendered}</a></li>').join("")}
       ${result.length ?  '</ul>' : ''}');
       this.isSpinnerVisible = false;
      });

     //Create Read Update Delete
          
    }



 keyPressDispatcher(e){
    //console.log(e.keyCode);


    if(e.keyCode=83 && this.isOverlayOpen==false && !$("input,textarea").is(":focus")){
       this.openOverlay();
 }
    //esc is presses then close the overlay
    if(e.keycode=27 && this.isOverlayOpen){
         this.closeOverlay();
 }
}


openOverlay(){
//console.log('openOverlay is called');
this.isOverlayOpen= true;
    this.searchOverlay.addClass("search-overlay--active")
    $("body").addClass("body-no-scroll");
}

closeOverlay(){
  //  console.log('closeOverlay is called');
    this.isOverlayOpen= false;
    this.searchOverlay.removeClass("search-overlay--active")
    $("body").removeClass("body-no-scroll");
}
}

export default Search