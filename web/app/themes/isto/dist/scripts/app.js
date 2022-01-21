"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[742],{904:function(e,t,n){var i=n(845),a=n(186),r=n(997),s=n(306),o=n(394),c=n(764),l=n(95),d=n(30),u=(n(471),n(772)),p=(n(710),n(955)),m=n(888);i.Z.use([a.Z,r.Z]),window.Alpine=s.Z,new i.Z(".swiper-container-products",{navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},slidesPerView:1,spaceBetween:32,breakpoints:{640:{slidesPerView:2,spaceBetween:64}}}),new i.Z(".swiper-container-manufacturers, .swiper-container-related",{navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},slidesPerView:1,spaceBetween:8,breakpoints:{640:{slidesPerView:3,spaceBetween:16}}}),new i.Z(".swiper-container-hero",{navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},slidesPerView:1,spaceBetween:8,on:{init:function(e){var t=d.Z.timeline({easing:"easeOutSine"}),n=document.querySelector('[data-hero-line="'.concat(e.activeIndex,'"]')),i=document.querySelector('[data-hero-text="'.concat(e.activeIndex,'"]'));document.querySelector('[data-swiper-slide="'.concat(e.activeIndex,'"]'));t.add({targets:n,top:0,duration:1700}).add({targets:i,opacity:1,duration:1700})},slideNextTransitionStart:function(e){var t=d.Z.timeline({easing:"easeOutSine"}),n=document.querySelector('[data-hero-line="'.concat(e.activeIndex,'"]')),i=document.querySelector('[data-hero-text="'.concat(e.activeIndex,'"]'));document.querySelector('[data-swiper-slide="'.concat(e.activeIndex,'"]'));t.add({targets:n,top:0,duration:1700}).add({targets:i,opacity:1,duration:1700})}}}),new i.Z(".swiper-container-materials, .swiper-container-simple",{navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},pagination:{el:".swiper-pagination",type:"fraction"},slidesPerView:1,spaceBetween:8}),document.querySelectorAll(".scrollmagic").forEach((function(e){var t=new m.Controller,n=d.Z.timeline({easing:"easeOutSine"}),i=e.querySelector(".anime-line-down"),a=e.querySelector(".anime-fade-from-left"),r=e.querySelector(".anime-fade-in");new m.Scene({triggerElement:e,reverse:!1,triggerHook:100}).addTo(t).on("enter",(function(){n.add({targets:i,height:"150%"}).add({targets:a,opacity:1,translateX:["-100%","0"]}).add({targets:r,opacity:1})}))})),document.addEventListener("alpine:init",(function(){s.Z.data("contactUs",(function(){return{data:{loading:!1,referer:null,type:null,products:[],name:null,email:null,phone:null,message:null,city:null,privacy_policy:!1,productId:null,errors:!1,response:null,sent:!1},setProps:function(e,t,n,i){this.data.productId=e,this.data.products=t?JSON.parse(t):[],this.data.referer=n,this.data.type=i},handleErrors:function(e){if(!e.ok)throw Error(e.statusText);return e},handleValidation:function(){return!!(this.data.name&&this.data.email&&this.data.phone&&this.data.message&&this.data.city&&this.data.privacy_policy)||(this.data.errors=!0,this.data.sent=!1,this.data.loading=!1,this.data.response="Fields market with * is required.",!1)},resetForm:function(){this.data.name=null,this.data.type=null,this.data.referer=null,this.data.products=[],this.data.productId=!1,this.data.email=null,this.data.phone=null,this.data.message=null,this.data.city=null,this.data.privacy_policy=!1},submitForm:function(){var e=this;this.data.loading=!0,this.data.errors=!1,this.handleValidation()&&fetch("/wp-json/isto/v1/contactus",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify(this.data)}).then(this.handleErrors).then((function(){e.data.errors=!1,e.data.loading=!1,e.data.response="",e.data.sent=!0,e.resetForm()})).catch((function(t){e.data.errors=!0,e.data.loading=!1,e.data.response=t})).finally((function(){e.loading=!1}))}}}))}));var h=document.querySelectorAll(".wc-block-product-categories-list--depth-0 > .wc-block-product-categories-list-item"),f=document.createElement("a"),g=document.querySelector(".wc-block-product-categories");f.setAttribute("href","/produktai"),f.innerText="Produktų katalogas",f.classList.add("uppercase","text-13px","mb-2","inline-block"),g&&g.before(f);var v=document.createElement("div"),w=document.querySelector(".sidebar-filters");v.innerText="Filtruoti",v.classList.add("uppercase","text-13px","mb-1","inline-block","border-t","border-gray-2","pt-5"),w&&document.querySelector(".sidebar-filters").before(v),h.forEach((function(e){var t=e.querySelector("a"),n=document.createElement("span");n.classList.add("sidebar-sections-toggle"),t.before(n),n.addEventListener("click",(function(e){e.preventDefault();var t=e.target,n=t.nextElementSibling.nextElementSibling;t.classList.toggle("inactive"),n.classList.toggle("hidden")}))})),document.querySelectorAll(".bapf_head").forEach((function(e){e.addEventListener("click",(function(t){t.preventDefault(),e.classList.toggle("inactive"),e.nextElementSibling.classList.toggle("hidden")}))})),document.querySelectorAll(".nav-primary-mobile > .menu-item-has-children > .sub-menu > li.menu-item > a").forEach((function(e){e.addEventListener("click",(function(e){e.preventDefault();var t=e.currentTarget.innerText,n=e.currentTarget.nextElementSibling,i=document.createElement("li"),a=document.createElement("img"),r=document.createTextNode(t);n.classList.add("active"),i.classList.add("submenu-title"),i.appendChild(r),a.setAttribute("src","/arrow-left.svg"),a.classList.add("submenu-back","w-6"),i.prepend(a),n.prepend(i),n.querySelector(".submenu-back").addEventListener("click",(function(e){e.preventDefault(),i.remove(),n.classList.remove("active")}))}))})),document.querySelector(".inner-scroll")&&new u.Z(".inner-scroll",{wheelSpeed:2,wheelPropagation:!0,minScrollbarLength:20}),s.Z.store("favs",{items:[],init:function(){var e=p.Z.get("favs");e&&(this.items=JSON.parse(e))},toggleFav:function(e){this.items.includes(e)?this.items=this.items.filter((function(t){return t!==e})):this.items.push(e),p.Z.set("favs",JSON.stringify(this.items))},isSelected:function(e){return this.items.includes(e)}}),s.Z.plugin(l.Z),s.Z.plugin(o.Z),s.Z.plugin(c.Z),s.Z.start()},199:function(){}},function(e){var t=function(t){return e(e.s=t)};e.O(0,[692,941],(function(){return t(904),t(199)}));e.O()}]);