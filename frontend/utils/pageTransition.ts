import {gsap} from "gsap";
import {ScrollTrigger} from "gsap/ScrollTrigger";

let timer: NodeJS.Timeout;

const wordCounter = ref(1);

gsap.registerPlugin(ScrollTrigger);
ScrollTrigger.defaults({
    markers: false
});

export const initWords = () => {
    timer = setInterval(() => {
        let item: any = document.querySelector('[data-word-active="true"]');
        let next: any = item.nextSibling;

        if ( ! next ) {
            item.dataset.wordActive = false;
            item = document.querySelector('.transition__text--first');
            item.dataset.wordActive = true;

            return;
        }

        item.dataset.wordActive = false;
        next.dataset.wordActive = true;

        wordCounter.value++;
    }, 1000);
}

export const initPageLoader = () => {
    const tl = gsap.timeline();

    // Elements
    const header = document.querySelector( '.header' );
    const cookie = document.querySelector( '.cookie:not(._hide)' );
    const scrollIcon = document.querySelector('.scroll__icon');

    if (timer){
        clearInterval( timer );
    }

    tl.to(".transition__text",{
        yPercent: -50,
        duration: 1.4,
        ease: "Power4.easeInOut",
        delay: 1,
        opacity: 0
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

    if ( header ) {
        tl.set(header, {
            yPercent: 100,
            duration: 1,
            ease: "Power4.easeInOut",
            delay: 1,
        }, "<=");
    }

    if ( scrollIcon ) {
        tl.set(scrollIcon, {
            yPercent: -120,
            ease: "Power4.easeInOut",
        }, "<=");
    }

    if(cookie) {
        tl.set(cookie, {
            yPercent: -120,
            duration: 1,
            ease: "Power4.easeInOut",
            delay: 1
        }, "<=");
    }


}

export const initPageIn = () => {
    const tl = gsap.timeline();

    tl.set(".transition__first",{
        yPercent: 100,
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

    document.querySelector('body').classList.remove( 'menu--open', '_lock' );
}