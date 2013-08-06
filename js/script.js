/**
 * PHP Light Control
 *
 * Controls Tellstick lighting with a smooth and familiar interface.
 *
 * This file contains all the JavaScript for the project
 *
 * Copyright 2013 fiLLLip
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

function toast(message){
    $("#toast").text(message);
    $("#toast").toast('show');
}

$(document).ready(function() {
    $(".light").click(function(){
        var element = $(this);

        if (element.hasClass('working')) {
            return;
        }

        element.addClass('working');

        $.mobile.loading("show");

        if (element.hasClass('lighton')) {
            $.ajax({
                url: 'index.php?tool&method=turnOff&id=' + $(this).attr('id'),
                cache: false
            }).done(function(data){
                    element.removeClass('working');
                    $.mobile.loading("hide");
                    if (data.indexOf("1") != -1) {
                        element.removeClass('lighton');
                        toast("Turned off light");
                    }
                    else {
                        toast("Couldn't turn off light");
                    }
                });
        }
        else {
            $.ajax({
                url: 'index.php?tool&method=turnOn&id=' + $(this).attr('id'),
                cache: false
            }).done(function(data){
                    element.removeClass('working');
                    $.mobile.loading("hide");
                    if (data.indexOf("1") != -1) {
                        element.addClass('lighton');
                        toast("Turned on light");
                    }
                    else {
                        toast("Couldn't turn on light");
                    }
                });
        }
    });
});