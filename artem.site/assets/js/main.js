function POST(url, data) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: url,
      type: "POST",
      data: data,
    }).then((_data, textStatus, _jqXHR) => {
      resolve({ data: _data, jqXHR: _jqXHR });
    }).catch((_jqXHR, textStatus, errorThrown) => {
      resolve({ jqXHR: _jqXHR });
    });
  });
}

function GET(url, data) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: url,
      type: "GET",
      data: data,
    }).then((_data, textStatus, _jqXHR) => {
      resolve({ data: _data, jqXHR: _jqXHR });
    }).catch((_jqXHR, textStatus, errorThrown) => {
      resolve({ jqXHR: _jqXHR });
    });
  });
}


document.addEventListener('DOMContentLoaded', () => {
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  if ($navbarBurgers.length > 0) {
    $navbarBurgers.forEach(el => {
      el.addEventListener('click', () => {
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      });
    });
  }

  // New selector
  jQuery.expr[':'].Contains = function (a, i, m) {
    return jQuery(a).text().toUpperCase()
      .indexOf(m[3].toUpperCase()) >= 0;
  };

  // Overwrites old selecor
  jQuery.expr[':'].contains = function (a, i, m) {
    return jQuery(a).text().toUpperCase()
      .indexOf(m[3].toUpperCase()) >= 0;
  };

  $("#search").keyup(function (e) {
    if (e.keyCode == 13) {
      let element = $(".column:contains('" + $(this).val() + "'):first");

      if (element.length != 0) {
        if ($navbarBurgers.length > 0) {
          $navbarBurgers.forEach(el => {
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            $target.classList.toggle('is-active');
          });
        }

        $("html, body").animate({ scrollTop: element.offset().top - 56 }, 600, () => {
          element.animate({ opacity: 0.5 }, 250, () => { element.animate({ opacity: 1.0 }, 250); });
        });
      }
    }
  });

  $("#register-form").submit(async function (e) {
    e.preventDefault();

    $("#register-email-control").addClass("is-loading");
    $("#register-password-control").addClass("is-loading");

    $("#register-email").prop("disabled", true);
    $("#register-password").prop("disabled", true);
    $("#register-button").prop("disabled", true);

    let email = $("#register-email").val(),
      password = $("#register-password").val();

    let response = (await User.register(email, password)).jqXHR;

    if (response.status == 200) {
      window.location.href = "/";
    } else {
      $("#register-email-control").removeClass("is-loading");
      $("#register-password-control").removeClass("is-loading");

      $("#register-email").prop("disabled", false);
      $("#register-password").prop("disabled", false);
      $("#register-button").prop("disabled", false);

      $("#register-password").val("");
    }
  });

  $("#login-form").submit(async function (e) {
    e.preventDefault();

    $("#login-email-control").addClass("is-loading");
    $("#login-password-control").addClass("is-loading");

    $("#login-email").prop("disabled", true);
    $("#login-password").prop("disabled", true);
    $("#login-button").prop("disabled", true);

    let email = $("#login-email").val(),
      password = $("#login-password").val();

    let response = (await User.login(email, password)).jqXHR;

    if (response.status == 200) {
      window.location.href = "/";
    } else {
      $("#login-email-control").removeClass("is-loading");
      $("#login-password-control").removeClass("is-loading");

      $("#login-email").prop("disabled", false);
      $("#login-password").prop("disabled", false);
      $("#login-button").prop("disabled", false);
      $("#login-password").val("");
    }
  });
});

Handlebars.registerHelper('switch', function (value, options) {
  this.switch_value = value;
  return options.fn(this);
});

Handlebars.registerHelper('case', function (value, options) {
  if (value == this.switch_value) {
    return options.fn(this);
  }
});

class News {
  static urls = {
    "default": "/api/news",
    "appsFree": "/api/news/apps/free",
    "appsPaid": "/api/news/apps/paid",
    "movies": "/api/news/movies",
  };

  static get(type) {
    return $.getJSON(this.urls[type]);
  }

  static render(news, htmlElement) {
    $("#news-loading").fadeIn();

    htmlElement
      .hide()
      .append(Handlebars.partials["news-columns"](news))
      .slideDown();

    $("#news-loading").slideUp();
  }
}

class User {
  static async register(email, password) {
    return await (POST("/api/user/auth", {
      email: email,
      password: password
    }));
  }

  static async login(email, password) {
    return await (GET("/api/user/auth", {
      email: email,
      password: password
    }));
  }
}

function random_color() {
  var x = Math.floor(Math.random() * 256);
  var y = Math.floor(Math.random() * 256);
  var z = Math.floor(Math.random() * 256);
  
  return `rgb(${x}, ${y}, ${z})`;
}

class Devices {
  static async getAll() {
    return (await (GET("/api/devices"))).data;
  }

  static render(devices, htmlElement) {
    $("#devices-loading").fadeIn();

    htmlElement
      .hide()
      .append(Handlebars.partials["devices-columns"](devices))
      .slideDown();

    $("#devices-loading").slideUp();
  }

  static generateDataSets(_devices) {
    let _ds = [];

    var color = Chart.helpers.color;

    _devices.forEach((dev) => {
      let _data = [];

      dev.price.forEach((price) => {
        _data.push({
          x: Date.parse(price.timestamp),
          y: price.price
        });
      });

      _ds.push({
        label: dev.name,
        data: _data,
        backgroundColor: color(random_color()).alpha(0.5).rgbString(),
        borderColor: random_color(),
        fill: false,
      });
    });

    console.log(_ds);

    return _ds;
  }
}