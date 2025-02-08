import {gsap} from "gsap";
import {ScrollTrigger} from "gsap/ScrollTrigger";

let scroll;

gsap.registerPlugin(ScrollTrigger);
ScrollTrigger.defaults({
    markers: false
});

export const initWords = () => {
    let timer: NodeJS.Timeout;

    timer = setInterval(() => {
        const item: any = document.querySelector('[data-word-active="true"]');
        const next: any = item.nextSibling;

        if (next) {
            item.dataset.wordActive = false;
            next.dataset.wordActive = true;
        } else {
            clearInterval(timer);
            initPageLoader();
        }
    }, 1000);
}

export const initPageLoader = () => {
    const tl = gsap.timeline();

    // Elements
    const cookie = document.querySelector( '.cookie' );
    const scrollIcon = document.querySelector('.scroll__icon');

    tl.call(function() {
        scroll.stop();
    }, null, 0);

    if ( scrollIcon ) {
        tl.set(scrollIcon, {
            xPercent: -120,
            duration: 2,
        });
    }

    // if(cookie) {
    //     tl.set(cookie, {
    //         yPercent: -150,
    //         duration: 2,
    //     });
    // }

    tl.to(".transition__text",{
        yPercent: -50,
        duration: 1.4,
        ease: "Power4.easeInOut",
        delay: 1,
    });

    tl.to(".transition__first",{
        yPercent: -100,
        duration: 1.1,
        ease: "Expo.easeInOut",
    },"<");

    tl.to(".transition__first-inner", {
        yPercent: 100,
        duration: 1.1,
        ease: "Expo.easeInOut"
    },"<");

    tl.to(".transition__last-duplicate", {
        yPercent: -100,
        duration: 1.4,
        ease: "Expo.easeInOut",
    },"<");

    tl.to(".transition__last-inner", {
        yPercent: 100,
        duration: 1.4,
        ease: "Expo.easeInOut",
    },"<");
}

export const initPageIn = () => {
    const tl = gsap.timeline();

    tl.call(function() {
        scroll.start();
    });

    tl.set(".transition__first",{
        yPercent: 100
    });

    tl.set(".transition__first-inner",{
        yPercent: -100
    });

    tl.to(".transition__first",{
        yPercent: 0,
        duration: 0.5,
        ease: "Power2.easeIn",
    });

    tl.to(".transition__first-inner", {
        yPercent: 0,
        duration: 0.5,
        ease: "Power2.easeIn"
    },"<");

    tl.set(".transition__last, .transition__last-inner",{
        yPercent: 0,
        delay: 0.1
    });

    tl.to(".transition__first",{
        yPercent: -100,
        duration: 1.1,
        ease: "Expo.easeOut",
    },"<");

    tl.to(".transition__first-inner", {
        yPercent: 100,
        duration: 1.1,
        ease: "Expo.easeOut"
    },"<");

    tl.to(".transition__last", {
        yPercent: -100,
        duration: 1.4,
        ease: "Expo.easeOut",
    },"< 0.1");

    tl.to(".transition__last-inner", {
        yPercent: 100,
        duration: 1.4,
        ease: "Expo.easeInOut",
    },"< 0.1");
}