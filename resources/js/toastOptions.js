export const options = {
    duration: 5000,
    action: {
        text: "OK",
        onClick: function(e, toast) {
            toast.goAway(0);
        }
    }
};
