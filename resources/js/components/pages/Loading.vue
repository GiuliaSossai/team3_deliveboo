<template>
    <div>
        <div class="wrapper">
            <div class="press">
                <div class="holder"></div>
                <div class="lid"></div>
                <div class="carafe">
                    <div class="drop"></div>
                    <div class="spout"></div>
                    <div class="contents">
                        <div class="grounds"></div>
                        <div class="water"></div>
                    </div>
                </div>
                <div class="plunger">
                    <div class="shaft">
                        <div class="knob"></div>
                    </div>
                    <div class="filter"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Loading",
};
</script>

<style lang="scss" scoped>
$color-bg: #9ef38d;
$color-grounds: #332409;
$color-coffee: rgba($color-grounds, 0.85);
$color-water: rgba(#5ee6eb, 0.15);
$color-lid: #332532;
$color-accent: #734952;
$color-carafe: rgba(#fff6eb, 0.2);
$color-filter: $color-lid;
$color-shading: rgba(#000, 0.12);
$color-highlight: rgba(#fff, 0.1);

$carafe-height: 80%;
$carafe-padding: 5%;
$lid-height: 100% - $carafe-height;
$grounds-height: 20%;

$time: 3000ms;

@mixin position($top, $right, $bottom, $left) {
    position: absolute;
    top: $top;
    right: $right;
    bottom: $bottom;
    left: $left;
}

.wrapper {
    @include position(0, 0, 0, 0);
    background: $color-bg;
    display: flex;
    overflow: hidden;
}

.holder {
    @include position(25%, 100%, 25%, auto);
    width: 20%;
    background: $color-lid;
    border-right: 0;
    border-radius: 100% 0 0 100% / 20% 0 0 20%;
    &:after {
        @include position(10%, 0, 10%, 37%);
        content: "";
        display: block;
        background: $color-bg;
        border-radius: 100% 0 0 100% / 20% 0 0 20%;
    }
}

.press {
    margin: auto;
    width: 18vh;
    max-width: 70%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -20%);
    animation: pour $time infinite;
    transform-origin: 50% 20%;
    &:after {
        content: "";
        display: block;
        padding-top: 180%;
    }
}

.carafe {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    box-sizing: border-box;
    height: $carafe-height;
    background: $color-carafe;
    border-radius: 0 0 4% 4%;
    box-shadow: inset -4rem 0 $color-highlight;
    z-index: 0;
}

.drop {
    width: 30%;
    background: $color-coffee;
    position: absolute;
    left: 95%;
    top: 4%;
    border-radius: 0 100% 100% 100%;
    transform: rotate(-45deg);
    animation: drop $time infinite;
    transform-origin: left top;
    z-index: 1;
    &:after {
        content: "";
        display: block;
        padding-top: 100%;
    }
}

.spout {
    @include position(4%, auto, auto, 100%);
    width: 0;
    height: 0;
    padding-bottom: 140%;
    padding-left: 14%;
    overflow: hidden;
    &:after {
        content: "";
        display: block;
        width: 0;
        height: 0;
        margin-left: -500px;
        border-bottom: 500px solid transparent;
        border-left: 500px solid $color-carafe;
    }
}

.contents {
    position: absolute;
    top: 0;
    right: $carafe-padding;
    bottom: $carafe-padding;
    left: $carafe-padding;
    box-sizing: border-box;
    background: rgba($color-carafe, 0.1);
    border-radius: 0 0 1rem 1rem;
    z-index: -1;
    overflow: hidden;
}

.lid {
    position: absolute;
    right: 0;
    left: 0;
    background: $color-lid;
    border-top-right-radius: 20% 50%;
    border-top-left-radius: 20% 50%;
    height: 100% - $carafe-height;
    z-index: 10;
    box-shadow: inset -3rem 0 $color-shading;
    &:after {
        content: "";
        display: block;
        @include position(auto, -2.5%, 0, -2.5%);
        background: $color-lid;
        height: 20%;
        border-radius: 0.25rem;
        box-shadow: inset -4rem -1rem $color-shading;
    }
}

.plunger {
    position: absolute;
    top: 0;
    right: $carafe-padding;
    bottom: 15%;
    left: $carafe-padding;
    transform: translateY(-$carafe-height + $lid-height);
    animation: plunge $time infinite;
}

.shaft {
    width: 6%;
    position: absolute;
    top: 0;
    left: 50%;
    margin-left: -3%;
    bottom: 0;
    background: $color-accent;
    box-shadow: inset -0.25rem 0.75rem $color-shading;
    .knob {
        content: "";
        display: block;
        position: absolute;
        bottom: 98%;
        width: 400%;
        border-radius: 100%;
        left: -150%;
        background: $color-lid;
        box-shadow: inset -0.5rem 0 $color-shading;

        &:after {
            content: "";
            display: block;
            padding-top: 100%;
        }
    }
}

.filter {
    @include position(auto, 0, 0, 0);
    background: $color-accent;
    height: 5%;
    border: 0.3rem solid $color-filter;
    border-top: 0;
    border-bottom-right-radius: 1rem;
    border-bottom-left-radius: 1rem;
    box-sizing: border-box;
}

.grounds {
    @include position(auto, 0, 0, 0);
    background: $color-grounds;
    height: $grounds-height;
    transform: scaleY(0);
    border-radius: 0 0 4% 4%;
    transform-origin: bottom center;
    animation: fill-grounds $time infinite;
    animation-fill-mode: forwards;
}

.water {
    @include position(2.5%, 0, 0, -100%);
    background: $color-water;
    transform: scaleY(0);
    transform-origin: bottom center;
    animation: fill-water $time infinite;
    animation-fill-mode: forwards;
    z-index: 2;
}

@keyframes fill-grounds {
    10%,
    80% {
        transform: scaleY(1);
        opacity: 1;
    }
    5%,
    100% {
        opacity: 0;
        transform: scaleY(0);
    }
}

@keyframes fill-water {
    0%,
    10% {
        transform: scaleY(0);
    }
    30% {
        transform: scaleY(1);
        transform-origin: bottom right;
    }
    40%,
    50% {
        transform: scaleY(1) scaleX(1) rotate(0);
        background-color: $color-coffee;
        transform-origin: top right;
    }
    70%,
    100% {
        transform: rotate(-90deg);
        transform-origin: top right;
        background-color: $color-coffee;
    }
}

@keyframes plunge {
    0%,
    32%,
    100% {
        transform: translateY(-72%);
    }
    47%,
    80% {
        transform: translateY(0);
    }
}

@keyframes pour {
    50%,
    100% {
        transform: translate(-50%, -20%) rotate(0deg);
    }
    75%,
    80% {
        transform: rotate(90deg);
    }
}

@keyframes drop {
    0%,
    50% {
        transform: rotate(-45deg) scale(0);
    }
    70% {
        transform: rotate(-45deg) scale(1.2);
    }
    72% {
        transform: rotate(-45deg) scale(1);
    }
    80%,
    100% {
        transform: rotate(-45deg) scale(1) translate(70vw, 70vw);
    }
}
</style>
