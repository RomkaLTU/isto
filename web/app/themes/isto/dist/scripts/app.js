(self.webpackChunk=self.webpackChunk||[]).push([[742],{904:function(e,t,a){"use strict";var n=a(845),i=a(186),r=a(997),o=a(306),s=a(394),d=a(30),c=(a(471),a(888));n.Z.use([i.Z,r.Z]),window.Alpine=o.Z,new n.Z(".swiper-container-manufacturers",{navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},slidesPerView:1,spaceBetween:8,breakpoints:{640:{slidesPerView:3,spaceBetween:16}}}),new n.Z(".swiper-container-hero",{navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},slidesPerView:1,spaceBetween:8,on:{init:function(e){var t=d.Z.timeline({easing:"easeOutSine"}),a=document.querySelector('[data-hero-line="'.concat(e.activeIndex,'"]')),n=document.querySelector('[data-hero-text="'.concat(e.activeIndex,'"]'));document.querySelector('[data-swiper-slide="'.concat(e.activeIndex,'"]'));t.add({targets:a,top:0,duration:1700}).add({targets:n,opacity:1,duration:1700})},slideNextTransitionStart:function(e){var t=d.Z.timeline({easing:"easeOutSine"}),a=document.querySelector('[data-hero-line="'.concat(e.activeIndex,'"]')),n=document.querySelector('[data-hero-text="'.concat(e.activeIndex,'"]'));document.querySelector('[data-swiper-slide="'.concat(e.activeIndex,'"]'));t.add({targets:a,top:0,duration:1700}).add({targets:n,opacity:1,duration:1700})}}}),new n.Z(".swiper-container-materials",{navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},pagination:{el:".swiper-pagination",type:"fraction"},slidesPerView:1,spaceBetween:8}),document.querySelectorAll(".scrollmagic").forEach((function(e){var t=new c.Controller,a=d.Z.timeline({easing:"easeOutSine"}),n=e.querySelector(".anime-line-down"),i=e.querySelector(".anime-fade-from-left"),r=e.querySelector(".anime-fade-in");new c.Scene({triggerElement:e,reverse:!1,triggerHook:100}).addTo(t).on("enter",(function(){a.add({targets:n,height:"150%"}).add({targets:i,opacity:1,translateX:["-100%","0"]}).add({targets:r,opacity:1})}))})),document.addEventListener("alpine:init",(function(){o.Z.data("contactUs",(function(){return{data:{loading:!1,name:null,email:null,phone:null,message:null,cities:[],privacy_policy:!1,errors:!1,response:null,sent:!1},handleErrors:function(e){if(!e.ok)throw Error(e.statusText);return e},handleValidation:function(){return!!(this.data.name&&this.data.email&&this.data.phone&&this.data.message&&this.data.cities.length&&this.data.privacy_policy)||(this.data.errors=!0,this.data.sent=!1,this.data.loading=!1,this.data.response="Fields market with * is required.",!1)},resetForm:function(){this.data.name=null,this.data.email=null,this.data.phone=null,this.data.message=null,this.data.cities=[],this.data.privacy_policy=!1},submitForm:function(){var e=this;this.data.loading=!0,this.data.errors=!1,this.handleValidation()&&fetch("/wp-json/isto/v1/contactus",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify(this.data)}).then(this.handleErrors).then((function(t){e.data.errors=!1,e.data.loading=!1,e.data.response="",e.data.sent=!0,e.resetForm(),console.log(t)})).catch((function(t){e.data.errors=!0,e.data.loading=!1,e.data.response=t})).finally((function(){e.loading=!1}))}}}))})),o.Z.plugin(s.Z),o.Z.start()},199:function(){}},function(e){"use strict";var t=function(t){return e(e.s=t)};e.O(0,[692,941],(function(){return t(904),t(199)}));e.O()}]);