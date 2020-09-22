export const options = {
    duration: 2000,
    action: {
        text: "OK",
        onClick: function(e, toast) {
            toast.goAway(0);
        }
    }
};
