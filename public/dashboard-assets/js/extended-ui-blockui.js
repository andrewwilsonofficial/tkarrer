"use strict";
$(function () {
  var s = $("#section-block"),
    e = $(".btn-section-block"),
    c = $(".btn-section-block-overlay"),
    t = $(".btn-section-block-spinner"),
    o = $(".btn-section-block-custom"),
    r = $(".btn-section-block-multiple"),
    a = $("#card-block"),
    l = $(".btn-card-block"),
    i = $(".btn-card-block-overlay"),
    n = $(".btn-card-block-spinner"),
    v = $(".btn-card-block-custom"),
    d = $(".btn-card-block-multiple"),
    k = $(".btn-page-block"),
    b = $(".btn-page-block-overlay"),
    u = $(".btn-page-block-spinner"),
    f = $(".btn-page-block-custom"),
    p = $(".btn-page-block-multiple"),
    g = $(".form-block"),
    m = $(".btn-form-block"),
    w = $(".btn-form-block-overlay"),
    y = $(".btn-form-block-spinner"),
    C = $(".btn-form-block-custom"),
    S = $(".btn-form-block-multiple");
  e.length &&
    s.length &&
    e.on("click", function () {
      $("#section-block").block({
        message: '<div class="spinner-border text-white" role="status"></div>',
        timeout: 1e3,
        css: { backgroundColor: "transparent", border: "0" },
        overlayCSS: { opacity: 0.5 },
      });
    }),
    c.length &&
      s.length &&
      c.on("click", function () {
        $("#section-block").block({
          message:
            '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", border: "0" },
          overlayCSS: { backgroundColor: "#fff", opacity: 0.8 },
        });
      }),
    t.length &&
      s.length &&
      t.on("click", function () {
        $("#section-block").block({
          message:
            '<div class="sk-wave mx-auto"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div>',
          timeout: 1e5,
          css: { backgroundColor: "transparent", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    o.length &&
      s.length &&
      o.on("click", function () {
        $("#section-block").block({
          message:
            '<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    r.length &&
      s.length &&
      r.on("click", function () {
        $("#section-block").block({
          message:
            '<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
          timeout: 1e3,
          onUnblock: function () {
            $("#section-block").block({
              message: '<p class="mb-0">Almost Done...</p>',
              timeout: 1e3,
              css: {
                backgroundColor: "transparent",
                color: "#fff",
                border: "0",
              },
              overlayCSS: { opacity: 0.25 },
              onUnblock: function () {
                $("#section-block").block({
                  message: '<div class="p-3 bg-success">Success</div>',
                  timeout: 500,
                  css: {
                    backgroundColor: "transparent",
                    color: "#fff",
                    border: "0",
                  },
                  overlayCSS: { opacity: 0.25 },
                });
              },
            });
          },
        });
      }),
    l.length &&
      a.length &&
      l.on("click", function () {
        $("#card-block").block({
          message:
            '<div class="spinner-border text-white" role="status"></div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    i.length &&
      a.length &&
      i.on("click", function () {
        $("#card-block").block({
          message:
            '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", border: "0" },
          overlayCSS: { backgroundColor: "#fff", opacity: 0.8 },
        });
      }),
    n.length &&
      a.length &&
      n.on("click", function () {
        $("#card-block").block({
          message :
            '<div class="sk-wave mx-auto"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    v.length &&
      a.length &&
      v.on("click", function () {
        $("#card-block").block({
          message:
            '<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    d.length &&
      a.length &&
      d.on("click", function () {
        $("#card-block").block({
          message:
            '<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
          timeout: 1e3,
          onUnblock: function () {
            $("#card-block").block({
              message: '<p class="mb-0">Almost Done...</p>',
              timeout: 1e3,
              css: {
                backgroundColor: "transparent",
                color: "#fff",
                border: "0",
              },
              overlayCSS: { opacity: 0.25 },
              onUnblock: function () {
                $("#card-block").block({
                  message: '<div class="p-3 bg-success">Success</div>',
                  timeout: 500,
                  css: {
                    backgroundColor: "transparent",
                    color: "#fff",
                    border: "0",
                  },
                  overlayCSS: { opacity: 0.25 },
                });
              },
            });
          },
        });
      }),
    k.length &&
      k.on("click", function () {
        $.blockUI({
          message:
            '<div class="spinner-border text-white" role="status"></div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    b.length &&
      b.on("click", function () {
        $.blockUI({
          message:
            '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", border: "0" },
          overlayCSS: { backgroundColor: "#fff", opacity: 0.8 },
        });
      }),
    u.length &&
      u.on("click", function () {
        $.blockUI({
          message:
            '<div class="sk-wave mx-auto"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    f.length &&
      f.on("click", function () {
        $.blockUI({
          message:
            '<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    p.length &&
      p.on("click", function () {
        $.blockUI({
          message:
            '<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
          timeout: 1e3,
          onUnblock: function () {
            $.blockUI({
              message: '<p class="mb-0">Almost Done...</p>',
              timeout: 1e3,
              css: {
                backgroundColor: "transparent",
                color: "#fff",
                border: "0",
              },
              overlayCSS: { opacity: 0.5 },
              onUnblock: function () {
                $.blockUI({
                  message: '<div class="p-3 bg-success">Success</div>',
                  timeout: 500,
                  css: {
                    backgroundColor: "transparent",
                    color: "#fff",
                    border: "0",
                  },
                  overlayCSS: { opacity: 0.5 },
                });
              },
            });
          },
        });
      }),
    m.length &&
      g.length &&
      m.on("click", function () {
        g.block({
          message:
            '<div class="spinner-border text-white" role="status"></div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    w.length &&
      g.length &&
      w.on("click", function () {
        g.block({
          message:
            '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", border: "0" },
          overlayCSS: { backgroundColor: "#fff", opacity: 0.8 },
        });
      }),
    y.length &&
      g.length &&
      y.on("click", function () {
        g.block({
          message:
            '<div class="sk-wave mx-auto"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    C.length &&
      g.length &&
      C.on("click", function () {
        g.block({
          message:
            '<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
          timeout: 1e3,
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
        });
      }),
    S.length &&
      g.length &&
      S.on("click", function () {
        g.block({
          message:
            '<div class="d-flex justify-content-center"><p class="mb-0">Please wait...</p> <div class="sk-wave m-0"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div> </div>',
          css: { backgroundColor: "transparent", color: "#fff", border: "0" },
          overlayCSS: { opacity: 0.5 },
          timeout: 1e3,
          onUnblock: function () {
            g.block({
              message: '<p class="mb-0">Almost Done...</p>',
              timeout: 1e3,
              css: { backgroundColor: "transparent", border: "0" },
              overlayCSS: { opacity: 0.25 },
              onUnblock: function () {
                g.block({
                  message: '<div class="p-3 bg-success">Success</div>',
                  timeout: 500,
                  css: { backgroundColor: "transparent", border: "0" },
                  overlayCSS: { opacity: 0.25 },
                });
              },
            });
          },
        });
      });
});
