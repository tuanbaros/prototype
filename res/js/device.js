var device = function() {

    this.check = false;

    this.init = function() {
        this.checkMobile();
    }

    this.checkMobile = function() {
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            this.check = true;
        }
    }
}
