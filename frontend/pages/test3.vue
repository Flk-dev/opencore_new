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
        {href: '/', text: 'home'},
		{href: '/', text: 'about us'},
		{href: '/', text: 'projects'},
		{href: '/', text: 'gallery'},
		{href: '/', text: 'contact'},
		{href: '/', text: 'sign in'},
	]

	// REFS
	const navbar = ref()
	const navLink = ref([])
	const isDragging = ref(false)
    const currentIndex = ref( 0 );


	// VARS
	let menuHeight,
			itemHeight,
			wrapHeight

	let scrollSpeed = 0,
			oldScrollY = 0,
			scrollY = 0,
			y = 0

	let touchStart = 0,
			touchY = 0


	function getHeight() {
		menuHeight = navbar.value.clientHeight
		itemHeight = navLink.value[0].clientHeight
		wrapHeight = navLink.value.length * itemHeight
	}

	function dispose(scroll) {
		gsap.set(navLink.value, {
			y: (i) => i * itemHeight + scroll,
			modifiers: {
				y: (y) => {
					const s = gsap.utils.wrap(
						-itemHeight,
						wrapHeight - itemHeight,
						parseInt(y)
					)
					return `${s}px`
				}
			}
		})
	}

	function lerp(number0, number1, time) {
		return number0 * (1 - time) + number1 * time
	}

	const render = () => {
		requestAnimationFrame(render)

        y = lerp(y * 0.9, (scrollY), 0.05);

		dispose(y)

		scrollSpeed = y - oldScrollY
		oldScrollY = y
	}

	onMounted(() => {
		getHeight()
		dispose(0)

		window.addEventListener('resize', () => {
			getHeight()
		})

		render()

	})

	const handleMouseWheel = (e) => {
		//scrollY -= e.deltaY

        let direction;
        if (e.deltaY < 0) {
            direction = 1;
            currentIndex.value--;
            if (currentIndex.value < 0) {
                currentIndex.value = navLink.value.length - 1;
            }
        } else {
            direction = -1;
            currentIndex.value++;
            if (currentIndex.value > navLink.value.length - 1) {
                currentIndex.value = 0;
            }
        }

        scrollY -= e.deltaY - (itemHeight * direction);
	}

	const handleTouchStart = (e) => {
		touchStart = e.clientY || e.touches[0].clientY
		isDragging.value = true
	}

	const handleTouchMove = (e) => {
		if(!isDragging.value) return
		touchY = e.clientY || e.touches[0].clientY
		scrollY += (touchY - touchStart) * 8
		touchStart = touchY
	}

	const handleTouchEnd = () => {
		isDragging.value = false
	}

</script>
<template>


	<nav class="menu__wrap">
		<ul
			class="menu__list"
			ref="navbar"
			:class="{'is-dragging': isDragging}"
			@mousewheel="handleMouseWheel"
			@selectstart="() => false"
		>
			<li
				v-for="link in links"
				class="menu__item"
				ref="navLink"
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

    &__item {
        position: absolute;
        width: 100%;        
    }

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