/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var CheckBox = class {
    constructor(parentE, chirldE) {
        this.parentE = parentE;
        this.chirldE = chirldE;
    }
    
    disableorenable(){
        for( var i in this.chirldE){
            if($(this.parentE).prop("checked")){
                $(this.chirldE[i]).prop("disabled", false);
            } else {
                $(this.chirldE[i]).prop("disabled", true);
            }
        }
    }
}

var ReasionOfStudent = class {
    constructor(parentE, chirldE) {
        this.parentE = parentE;
        this.chirldE = chirldE;
    }
    
    disableorenable(){
        for( var i in this.chirldE){
            if($(this.parentE).val() > 0){
                $(this.chirldE[i]).prop("disabled", false);
            } else {
                $(this.chirldE[i]).prop("disabled", true);
            }
        }
    }
}
