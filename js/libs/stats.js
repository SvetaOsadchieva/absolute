google.maps.__gjsload__('stats', function(_) {
    var SZ = function(a, b, c) {
        var d = [];
        _.Ic(a, function(a, c) {
            d.push(c + b + a)
        });
        return d.join(c)
    }, TZ = function(a, b, c, d) {
        var e = {};
        e.host = window.document.location && window.document.location.host || window.location.host;
        e.v = a;
        e.r = Math.round(1 / b);
        c && (e.client = c);
        d && (e.key = d);
        return e
    }, UZ = function(a) {
        var b = {};
        _.Ic(a, function(a, d) {
            b[(0, window.encodeURIComponent)(d)] = (0, window.encodeURIComponent)(a).replace(/%7C/g, "|")
        });
        return SZ(b, ":", ",")
    }, WZ = function(a, b, c, d) {
        var e;
        e = _.N(_.R, 23, 500);
        var f;
        f = _.N(_.R, 22, 2);
        this.C = a;
        this.D = b;
        this.F = e;
        this.l = f;
        this.B = c;
        this.m = d;
        this.f = new _.Hj;
        this.b = 0;
        this.j = _.Ka();
        VZ(this)
    }, VZ = function(a) {
        window.setTimeout(function() {
            XZ(a);
            VZ(a)
        }, Math.min(a.F * Math.pow(a.l, a.b), 2147483647))
    }, YZ = function(a, b, c) {
        a.f.set(b, c)
    }, XZ = function(a) {
        var b = TZ(a.D, a.B, a.m, void 0);
        b.t = a.b + "-" + (_.Ka() - a.j);
        a.f.forEach(function(a, d) {
            a = a();
            0 < a && (b[d] = Number(a.toFixed(2)) + (_.hm() ? "-if" : ""))
        });
        a.C.b({
            ev: "api_snap"
        }, b);
        ++a.b
    }, ZZ = function(a, b, c, d, e) {
        this.m = a;
        this.C = b;
        this.l = c;
        this.f = d;
        this.j = e;
        this.b = new _.Hj;
        this.B =
        _.Ka()
    }, $Z = function(a, b, c) {
        this.l = b;
        this.f = a + "/maps/gen_204";
        this.j = c
    }, a_ = function() {
        this.b = new _.Hj
    }, b_ = function(a) {
        var b = 0, c = 0;
        a.b.forEach(function(a) {
            b += a.Lo;
            c += a.ko
        });
        return c ? b / c : 0
    }, c_ = function(a, b, c, d, e) {
        this.B = a;
        this.C = b;
        this.m = c;
        this.j = d;
        this.l = e;
        this.f = {};
        this.b = []
    }, d_ = function(a, b, c, d) {
        this.j = a;
        _.z.bind(this.j, "set_at", this, this.l);
        _.z.bind(this.j, "insert_at", this, this.l);
        this.B = b;
        this.C = c;
        this.m = d;
        this.f = 0;
        this.b = {};
        this.l()
    }, e_ = function() {
        this.j = _.P(_.R, 6);
        this.b = new $Z(_.rg[35] ? _.P(_.pf(_.R),
        11) : _.Zv, _.Si, window.document);
        new d_(_.Pi, (0, _.p)(this.b.b, this.b), _.ag, !!this.j);
        var a = _.P(new _.jf(_.R.data[3]), 1);
        this.C = a.split(".")[1] || a;
        this.D = {};
        this.B = {};
        this.m = {};
        this.F = {};
        this.G = _.N(_.R, 0, 1);
        _.Ri && (this.l = new WZ(this.b, this.C, this.G, this.j))
    };
    ZZ.prototype.D = function(a) {
        var b = void 0, b = _.m(b) ? b : 1;
        this.b.isEmpty() && window.setTimeout((0, _.p)(function() {
            var a = TZ(this.C, this.l, this.f, this.j);
            a.t = _.Ka() - this.B;
            var b = this.b;
            _.Ij(b);
            for (var e = {}, f = 0; f < b.b.length; f++) {
                var g = b.b[f];
                e[g] = b.H[g]
            }
            _.Ty(a, e);
            this.b.clear();
            this.m.b({
                ev: "api_maprft"
            }, a)
        }, this), 500);
        b = this.b.get(a, 0) + b;
        this.b.set(a, b)
    };
    $Z.prototype.b = function(a, b) {
        b = b || {};
        var c = _.xk().toString(36);
        b.src = "apiv3";
        b.token = this.l;
        b.ts = c.substr(c.length - 6);
        a.cad = UZ(b);
        a = SZ(a, "=", "&");
        a = this.f + "?target=api&" + a;
        this.j.createElement("img").src = a;
        (b = _.Nc.__gm_captureCSI) && b(a)
    };
    a_.prototype.f = function(a, b, c) {
        this.b.set(_.yb(a), {
            Lo: b,
            ko: c
        })
    };
    c_.prototype.D = function(a) {
        this.f[a] || (this.f[a]=!0, this.b.push(a), 2 > this.b.length && _.hz(this, this.F, 500))
    };
    c_.prototype.F = function() {
        for (var a = TZ(this.C, this.m, this.j, this.l), b = 0, c; c = this.b[b]; ++b)
            a[c] = "1";
        a.hybrid =+ _.fl();
        this.b.length = 0;
        this.B.b({
            ev: "api_mapft"
        }, a)
    };
    d_.prototype.l = function() {
        for (var a; a = this.j.removeAt(0);) {
            var b = a.Nn;
            a = a.timestamp - this.C;
            ++this.f;
            this.b[b] || (this.b[b] = 0);
            ++this.b[b];
            if (20 <= this.f&&!(this.f%5)) {
                var c = {};
                c.s = b;
                c.sr = this.b[b];
                c.tr = this.f;
                c.te = a;
                c.hc = this.m ? "1" : "0";
                this.B({
                    ev: "api_services"
                }, c)
            }
        }
    };
    e_.prototype.S = function(a) {
        a = _.yb(a);
        this.D[a] || (this.D[a] = new c_(this.b, this.C, this.G, this.j));
        return this.D[a]
    };
    e_.prototype.O = function(a) {
        a = _.yb(a);
        this.B[a] || (this.B[a] = new ZZ(this.b, this.C, 1, this.j));
        return this.B[a]
    };
    e_.prototype.f = function(a) {
        if (this.l) {
            this.m[a] || (this.m[a] = new _.hA, YZ(this.l, a, function() {
                return b.nb()
            }));
            var b = this.m[a];
            return b
        }
    };
    e_.prototype.da = function(a) {
        if (this.l) {
            this.F[a] || (this.F[a] = new a_, YZ(this.l, a, function() {
                return b_(b)
            }));
            var b = this.F[a];
            return b
        }
    };
    var f_ = new e_;
    _.kc("stats", f_);
});


