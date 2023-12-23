$(".price-slider").asRange({
    range: true,
    limit: false,
    max: 500000,
	min: 1000,
    step: 100,
    tip: {
        active: 'onMove'
    },
    keyboard: true
});