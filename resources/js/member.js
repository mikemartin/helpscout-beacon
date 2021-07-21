(function () {
  const script = document.createElement('script');
  script.src = '/vendor/helpscout-beacon/js/beacon.js';
  script.addEventListener('load', function () {
    const beaconData = window.__HELPSCOUT_BEACON__;
    if (!beaconData || !beaconData.beacon_id) {
      return false;
    }
    if (beaconData.avatar) {
      beaconData.user.avatar = helpscout.user.website + helpscout.avatar;
    }
    window.Beacon('init', beaconData.beacon_id);
    window.Beacon('identify', beaconData.user);
  });
  document.body.appendChild(script);
})();
