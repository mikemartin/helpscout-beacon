let script = document.createElement('script');
script.src = '/vendor/helpscout-beacon/js/beacon.js';

document.body.appendChild(script);

script.addEventListener('load', () => {

  let helpscout = Statamic.$config.get('helpscout')

  window.Beacon('init', helpscout.beacon_id);

  window.Beacon('identify', {
      name: helpscout.name,
      email: helpscout.email,
      user: helpscout.user,
      signature: helpscout.signature
  });
});
