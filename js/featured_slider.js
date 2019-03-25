    $(document).ready(function(){
        /*For featured product slider*/
        //var featured_frame = 5;
        var featured_frame = $('.slider > a').size();        
        
        var featured_product_width = 224*featured_frame;        
        $('.slider').css('width',featured_product_width + 'px');
        
        var current_position = 0;
        var current_frame = 1;  
           
        $('#featured_right').click(function(){            
            
            
            
            if(current_frame<featured_frame)
            {   
                if(featured_frame-current_frame==2)
                {
                    current_position = featured_product_width - 535;
                    //current_frame = current_frame + 1;
                    current_position = featured_product_width - 535;
                    $('.slider').animate({left:-current_position},800);
                }
                else{
                    current_frame = current_frame + 1;
                    current_position = current_position + 224;
                    $('.slider').animate({left:-current_position},800);
                }
                
            }            
        });
        
        $('#featured_left').click(function(){

            if(current_frame>1)
            {                
                current_frame = current_frame - 1;
                current_position = current_position - 224;
                $('.slider').animate({left:-current_position},800);
            }                 
            else if(current_frame==1)
            {                
                //current_frame = current_frame - 1;
                current_position = 0;
                $('.slider').animate({left:-current_position},800);
            }       
        });
        
        /*End For featured product slider*/
               
    });