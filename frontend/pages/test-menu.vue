<template>
	<nav class="menu__wrap">
		<ul
			class="menu__list"
			ref="menuRef"
            @mousewheel="handleUpdateScroll"
		>
			<li
				v-for="link in links"
				class="menu__item"
				ref="menuItemRefs"
			>
				<nuxt-link
					class="menu__link"
					:to="link.href"
					@dragstart.prevent
				>
					{{ link.text }}
				</nuxt-link>

			</li>
		</ul>
	</nav>
</template>

<script setup>
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
ScrollTrigger.defaults({
  markers: false
});

const links = [
		{href: '/', text: 'home'},
		{href: '/', text: 'about us'},
		{href: '/', text: 'projects'},
		{href: '/', text: 'gallery'},
		{href: '/', text: 'contact'},
		{href: '/', text: 'sign in'},
	]

const menuRef = ref( null );
const menuItemRefs = ref( null );
const currentIndex = ref(0);
let inProgress = false;

onMounted( () => {
    const menuItemHeight = menuItemRefs.value[0].offsetHeight;
    const wrapHeight = menuRef.value.offsetHeight;
    const offsetY = window.innerHeight * 0.5;

    /*gsap.set(menuItemRefs.value[0], {
      y: (i) => offsetY + i * menuItemHeight
    });*/

    /*gsap.set(menuRef.value, {
      height: (menuItemRefs.value.length - 1) * menuItemHeight
    });*/
} );

const handleUpdateScroll = (e) => {
    if (inProgress) {
      return false;
    }

    let direction;
    if (e.deltaY < 0) {
      direction = 1;
      currentIndex.value--;
      if (currentIndex.value < 0) {
        currentIndex.value = menuItemRefs.value.length - 1;
      }
    } else {
      direction = -1;
      currentIndex.value++;
      if (currentIndex.value > menuItemRefs.value.length - 1) {
        currentIndex.value = 0;
      }
    }

    inProgress = true;

    const menuItemHeight = menuItemRefs.value[0].offsetHeight * 2;
    const wrapHeight = menuRef.value.offsetHeight;

    //console.log( menuItemHeight );

    // console.log(wrapHeight);

    gsap.to(menuItemRefs.value, {
      duration: 0.5,
      y: "+=" + menuItemHeight * direction,
      onComplete: () => {
        inProgress = false;
      },
      modifiers: {
        y: gsap.utils.unitize(gsap.utils.wrap(-menuItemHeight, wrapHeight))
      }
    });
  };

</script>

<style lang='scss' scoped>

.menu {
    
    &__wrap {
        background: var(--fg-blue);
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 9999;
        opacity: 1;
        visibility: visible;        
    }

    &__list {
        height: 100vh;
        overflow: hidden;
        list-style-type: none;        
    }

    /*&__item {
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;        
    }*/

    &__link {
        display: block;
        font-family: var(--ff-atyp);
        font-size: 10.6rem;
        font-weight: 400;
        font-style: italic;
        color: var(--fg-white-50);
        line-height: 100%;
        text-transform: uppercase;
        transition: var(--tr-regular);
        padding: 0 1rem;

        @media (max-width: $tablet) {
            font-size: 8.8rem;
        }

        @media (max-width: $mobile) {
            font-size: 4.4rem;
        }
    }
}
</style>