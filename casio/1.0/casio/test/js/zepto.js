!
function() {
	!
	function() {
		function a(a) {
			function b(a) {
				for (var b = [16, 11, 10, 16, 24, 40, 51, 61, 12, 12, 14, 19, 26, 58, 60, 55, 14, 13, 16, 24, 40, 57, 69, 56, 14, 17, 22, 29, 51, 87, 80, 62, 18, 22, 37, 56, 68, 109, 103, 77, 24, 35, 55, 64, 81, 104, 113, 92, 49, 64, 78, 87, 103, 121, 120, 101, 72, 92, 95, 98, 112, 100, 103, 99], c = 0; 64 > c; c++) {
					var d = y((b[c] * a + 50) / 100);
					1 > d ? d = 1 : d > 255 && (d = 255), z[P[c]] = d
				}
				for (var e = [17, 18, 24, 47, 99, 99, 99, 99, 18, 21, 26, 66, 99, 99, 99, 99, 24, 26, 56, 99, 99, 99, 99, 99, 47, 66, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99, 99], f = 0; 64 > f; f++) {
					var g = y((e[f] * a + 50) / 100);
					1 > g ? g = 1 : g > 255 && (g = 255), A[P[f]] = g
				}
				for (var h = [1, 1.387039845, 1.306562965, 1.175875602, 1, .785694958, .5411961, .275899379], i = 0, j = 0; 8 > j; j++) for (var k = 0; 8 > k; k++) B[i] = 1 / (z[P[i]] * h[j] * h[k] * 8), C[i] = 1 / (A[P[i]] * h[j] * h[k] * 8), i++
			}
			function c(a, b) {
				for (var c = 0, d = 0, e = new Array, f = 1; 16 >= f; f++) {
					for (var g = 1; g <= a[f]; g++) e[b[d]] = [], e[b[d]][0] = c, e[b[d]][1] = f, d++, c++;
					c *= 2
				}
				return e
			}
			function d() {
				t = c(Q, R), u = c(U, V), v = c(S, T), w = c(W, X)
			}
			function e() {
				for (var a = 1, b = 2, c = 1; 15 >= c; c++) {
					for (var d = a; b > d; d++) E[32767 + d] = c, D[32767 + d] = [], D[32767 + d][1] = c, D[32767 + d][0] = d;
					for (var e = -(b - 1); - a >= e; e++) E[32767 + e] = c, D[32767 + e] = [], D[32767 + e][1] = c, D[32767 + e][0] = b - 1 + e;
					a <<= 1, b <<= 1
				}
			}
			function f() {
				for (var a = 0; 256 > a; a++) O[a] = 19595 * a, O[a + 256 >> 0] = 38470 * a, O[a + 512 >> 0] = 7471 * a + 32768, O[a + 768 >> 0] = -11059 * a, O[a + 1024 >> 0] = -21709 * a, O[a + 1280 >> 0] = 32768 * a + 8421375, O[a + 1536 >> 0] = -27439 * a, O[a + 1792 >> 0] = -5329 * a
			}
			function g(a) {
				for (var b = a[0], c = a[1] - 1; c >= 0;) b & 1 << c && (I |= 1 << J), c--, J--, 0 > J && (255 == I ? (h(255), h(0)) : h(I), J = 7, I = 0)
			}
			function h(a) {
				H.push(N[a])
			}
			function i(a) {
				h(a >> 8 & 255), h(255 & a)
			}
			function j(a, b) {
				var c, d, e, f, g, h, i, j, k, l = 0;
				const m = 8, n = 64;
				for (k = 0; m > k; ++k) {
					c = a[l], d = a[l + 1], e = a[l + 2], f = a[l + 3], g = a[l + 4], h = a[l + 5], i = a[l + 6], j = a[l + 7];
					var o = c + j,
						p = c - j,
						q = d + i,
						r = d - i,
						s = e + h,
						t = e - h,
						u = f + g,
						v = f - g,
						w = o + u,
						x = o - u,
						y = q + s,
						z = q - s;
					a[l] = w + y, a[l + 4] = w - y;
					var A = .707106781 * (z + x);
					a[l + 2] = x + A, a[l + 6] = x - A, w = v + t, y = t + r, z = r + p;
					var B = .382683433 * (w - z),
						C = .5411961 * w + B,
						D = 1.306562965 * z + B,
						E = .707106781 * y,
						G = p + E,
						H = p - E;
					a[l + 5] = H + C, a[l + 3] = H - C, a[l + 1] = G + D, a[l + 7] = G - D, l += 8
				}
				for (l = 0, k = 0; m > k; ++k) {
					c = a[l], d = a[l + 8], e = a[l + 16], f = a[l + 24], g = a[l + 32], h = a[l + 40], i = a[l + 48], j = a[l + 56];
					var I = c + j,
						J = c - j,
						K = d + i,
						L = d - i,
						M = e + h,
						N = e - h,
						O = f + g,
						P = f - g,
						Q = I + O,
						R = I - O,
						S = K + M,
						T = K - M;
					a[l] = Q + S, a[l + 32] = Q - S;
					var U = .707106781 * (T + R);
					a[l + 16] = R + U, a[l + 48] = R - U, Q = P + N, S = N + L, T = L + J;
					var V = .382683433 * (Q - T),
						W = .5411961 * Q + V,
						X = 1.306562965 * T + V,
						Y = .707106781 * S,
						Z = J + Y,
						$ = J - Y;
					a[l + 40] = $ + W, a[l + 24] = $ - W, a[l + 8] = Z + X, a[l + 56] = Z - X, l++
				}
				var _;
				for (k = 0; n > k; ++k) _ = a[k] * b[k], F[k] = _ > 0 ? _ + .5 | 0 : _ - .5 | 0;
				return F
			}
			function k() {
				i(65504), i(16), h(74), h(70), h(73), h(70), h(0), h(1), h(1), h(0), i(1), i(1), h(0), h(0)
			}
			function l(a, b) {
				i(65472), i(17), h(8), i(b), i(a), h(3), h(1), h(17), h(0), h(2), h(17), h(1), h(3), h(17), h(1)
			}
			function m() {
				i(65499), i(132), h(0);
				for (var a = 0; 64 > a; a++) h(z[a]);
				h(1);
				for (var b = 0; 64 > b; b++) h(A[b])
			}
			function n() {
				i(65476), i(418), h(0);
				for (var a = 0; 16 > a; a++) h(Q[a + 1]);
				for (var b = 0; 11 >= b; b++) h(R[b]);
				h(16);
				for (var c = 0; 16 > c; c++) h(S[c + 1]);
				for (var d = 0; 161 >= d; d++) h(T[d]);
				h(1);
				for (var e = 0; 16 > e; e++) h(U[e + 1]);
				for (var f = 0; 11 >= f; f++) h(V[f]);
				h(17);
				for (var g = 0; 16 > g; g++) h(W[g + 1]);
				for (var j = 0; 161 >= j; j++) h(X[j])
			}
			function o() {
				i(65498), i(12), h(3), h(1), h(0), h(2), h(17), h(3), h(17), h(0), h(63), h(0)
			}
			function p(a, b, c, d, e) {
				var f, h = e[0],
					i = e[240];
				const k = 16, l = 63, m = 64;
				for (var n = j(a, b), o = 0; m > o; ++o) G[P[o]] = n[o];
				var p = G[0] - c;
				c = G[0], 0 == p ? g(d[0]) : (f = 32767 + p, g(d[E[f]]), g(D[f]));
				for (var q = 63; q > 0 && 0 == G[q]; q--);
				if (0 == q) return g(h), c;
				for (var r, s = 1; q >= s;) {
					for (var t = s; 0 == G[s] && q >= s; ++s);
					var u = s - t;
					if (u >= k) {
						r = u >> 4;
						for (var v = 1; r >= v; ++v) g(i);
						u = 15 & u
					}
					f = 32767 + G[s], g(e[(u << 4) + E[f]]), g(D[f]), s++
				}
				return q != l && g(h), c
			}
			function q() {
				for (var a = String.fromCharCode, b = 0; 256 > b; b++) N[b] = a(b)
			}
			function r(a) {
				if (0 >= a && (a = 1), a > 100 && (a = 100), x != a) {
					var c = 0;
					c = Math.floor(50 > a ? 5e3 / a : 200 - 2 * a), b(c), x = a, console.log("Quality set to: " + a + "%")
				}
			}
			function s() {
				var b = (new Date).getTime();
				a || (a = 50), q(), d(), e(), f(), r(a);
				var c = (new Date).getTime() - b;
				console.log("Initialization " + c + "ms")
			}
			var t, u, v, w, x, y = (Math.round, Math.floor),
				z = new Array(64),
				A = new Array(64),
				B = new Array(64),
				C = new Array(64),
				D = new Array(65535),
				E = new Array(65535),
				F = new Array(64),
				G = new Array(64),
				H = [],
				I = 0,
				J = 7,
				K = new Array(64),
				L = new Array(64),
				M = new Array(64),
				N = new Array(256),
				O = new Array(2048),
				P = [0, 1, 5, 6, 14, 15, 27, 28, 2, 4, 7, 13, 16, 26, 29, 42, 3, 8, 12, 17, 25, 30, 41, 43, 9, 11, 18, 24, 31, 40, 44, 53, 10, 19, 23, 32, 39, 45, 52, 54, 20, 22, 33, 38, 46, 51, 55, 60, 21, 34, 37, 47, 50, 56, 59, 61, 35, 36, 48, 49, 57, 58, 62, 63],
				Q = [0, 0, 1, 5, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0],
				R = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
				S = [0, 0, 2, 1, 3, 3, 2, 4, 3, 5, 5, 4, 4, 0, 0, 1, 125],
				T = [1, 2, 3, 0, 4, 17, 5, 18, 33, 49, 65, 6, 19, 81, 97, 7, 34, 113, 20, 50, 129, 145, 161, 8, 35, 66, 177, 193, 21, 82, 209, 240, 36, 51, 98, 114, 130, 9, 10, 22, 23, 24, 25, 26, 37, 38, 39, 40, 41, 42, 52, 53, 54, 55, 56, 57, 58, 67, 68, 69, 70, 71, 72, 73, 74, 83, 84, 85, 86, 87, 88, 89, 90, 99, 100, 101, 102, 103, 104, 105, 106, 115, 116, 117, 118, 119, 120, 121, 122, 131, 132, 133, 134, 135, 136, 137, 138, 146, 147, 148, 149, 150, 151, 152, 153, 154, 162, 163, 164, 165, 166, 167, 168, 169, 170, 178, 179, 180, 181, 182, 183, 184, 185, 186, 194, 195, 196, 197, 198, 199, 200, 201, 202, 210, 211, 212, 213, 214, 215, 216, 217, 218, 225, 226, 227, 228, 229, 230, 231, 232, 233, 234, 241, 242, 243, 244, 245, 246, 247, 248, 249, 250],
				U = [0, 0, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0],
				V = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
				W = [0, 0, 2, 1, 2, 4, 4, 3, 4, 7, 5, 4, 4, 0, 1, 2, 119],
				X = [0, 1, 2, 3, 17, 4, 5, 33, 49, 6, 18, 65, 81, 7, 97, 113, 19, 34, 50, 129, 8, 20, 66, 145, 161, 177, 193, 9, 35, 51, 82, 240, 21, 98, 114, 209, 10, 22, 36, 52, 225, 37, 241, 23, 24, 25, 26, 38, 39, 40, 41, 42, 53, 54, 55, 56, 57, 58, 67, 68, 69, 70, 71, 72, 73, 74, 83, 84, 85, 86, 87, 88, 89, 90, 99, 100, 101, 102, 103, 104, 105, 106, 115, 116, 117, 118, 119, 120, 121, 122, 130, 131, 132, 133, 134, 135, 136, 137, 138, 146, 147, 148, 149, 150, 151, 152, 153, 154, 162, 163, 164, 165, 166, 167, 168, 169, 170, 178, 179, 180, 181, 182, 183, 184, 185, 186, 194, 195, 196, 197, 198, 199, 200, 201, 202, 210, 211, 212, 213, 214, 215, 216, 217, 218, 226, 227, 228, 229, 230, 231, 232, 233, 234, 242, 243, 244, 245, 246, 247, 248, 249, 250];
			this.encode = function(a, b) {
				var c = (new Date).getTime();
				b && r(b), H = new Array, I = 0, J = 7, i(65496), k(), m(), l(a.width, a.height), n(), o();
				var d = 0,
					e = 0,
					f = 0;
				I = 0, J = 7, this.encode.displayName = "_encode_";
				for (var h, j, q, s, x, y, z, A, D, E = a.data, F = a.width, G = a.height, N = 4 * F, P = 0; G > P;) {
					for (h = 0; N > h;) {
						for (x = N * P + h, y = x, z = -1, A = 0, D = 0; 64 > D; D++) A = D >> 3, z = 4 * (7 & D), y = x + A * N + z, P + A >= G && (y -= N * (P + 1 + A - G)), h + z >= N && (y -= h + z - N + 4), j = E[y++], q = E[y++], s = E[y++], K[D] = (O[j] + O[q + 256 >> 0] + O[s + 512 >> 0] >> 16) - 128, L[D] = (O[j + 768 >> 0] + O[q + 1024 >> 0] + O[s + 1280 >> 0] >> 16) - 128, M[D] = (O[j + 1280 >> 0] + O[q + 1536 >> 0] + O[s + 1792 >> 0] >> 16) - 128;
						d = p(K, B, d, t, v), e = p(L, C, e, u, w), f = p(M, C, f, u, w), h += 32
					}
					P += 8
				}
				if (J >= 0) {
					var Q = [];
					Q[1] = J + 1, Q[0] = (1 << J + 1) - 1, g(Q)
				}
				i(65497);
				var R = "data:image/jpeg;base64," + btoa(H.join(""));
				//alert(btoa(H.join("")));
				H = [];
				var S = (new Date).getTime() - c;
				return console.log("Encoding time: " + S + "ms"), R
			}, s()
		}
		window.JPEGEncoder = a
	}(), function() {
		window.EXIF = {}, function() {
			function a(a, b, c) {
				a.addEventListener ? a.addEventListener(b, c, !1) : a.attachEvent && a.attachEvent("on" + b, c)
			}
			function b(a) {
				return !!a.exifdata
			}
			function c(a, b) {
				BinaryAjax(a.src, function(c) {
					var e = d(c.binaryResponse);
					a.exifdata = e || {}, b && b()
				})
			}
			function d(a) {
				if (255 != a.getByteAt(0) || 216 != a.getByteAt(1)) return !1;
				for (var b = 2, c = a.getLength(); c > b;) {
					if (255 != a.getByteAt(b)) return i && console.log("Not a valid marker at offset " + b + ", found: " + a.getByteAt(b)), !1;
					var d = a.getByteAt(b + 1);
					if (22400 == d) return i && console.log("Found 0xFFE1 marker"), g(a, b + 4, a.getShortAt(b + 2, !0) - 2);
					if (225 == d) return i && console.log("Found 0xFFE1 marker"), g(a, b + 4, a.getShortAt(b + 2, !0) - 2);
					b += 2 + a.getShortAt(b + 2, !0)
				}
			}
			function e(a, b, c, d, e) {
				for (var g = a.getShortAt(c, e), h = {}, j = 0; g > j; j++) {
					var k = c + 12 * j + 2,
						l = d[a.getShortAt(k, e)];
					!l && i && console.log("Unknown tag: " + a.getShortAt(k, e)), h[l] = f(a, k, b, c, e)
				}
				return h
			}
			function f(a, b, c, d, e) {
				var f = a.getShortAt(b + 2, e),
					g = a.getLongAt(b + 4, e),
					h = a.getLongAt(b + 8, e) + c;
				switch (f) {
				case 1:
				case 7:
					if (1 == g) return a.getByteAt(b + 8, e);
					for (var i = g > 4 ? h : b + 8, j = [], k = 0; g > k; k++) j[k] = a.getByteAt(i + k);
					return j;
				case 2:
					var l = g > 4 ? h : b + 8;
					return a.getStringAt(l, g - 1);
				case 3:
					if (1 == g) return a.getShortAt(b + 8, e);
					for (var i = g > 2 ? h : b + 8, j = [], k = 0; g > k; k++) j[k] = a.getShortAt(i + 2 * k, e);
					return j;
				case 4:
					if (1 == g) return a.getLongAt(b + 8, e);
					for (var j = [], k = 0; g > k; k++) j[k] = a.getLongAt(h + 4 * k, e);
					return j;
				case 5:
					if (1 == g) return a.getLongAt(h, e) / a.getLongAt(h + 4, e);
					for (var j = [], k = 0; g > k; k++) j[k] = a.getLongAt(h + 8 * k, e) / a.getLongAt(h + 4 + 8 * k, e);
					return j;
				case 9:
					if (1 == g) return a.getSLongAt(b + 8, e);
					for (var j = [], k = 0; g > k; k++) j[k] = a.getSLongAt(h + 4 * k, e);
					return j;
				case 10:
					if (1 == g) return a.getSLongAt(h, e) / a.getSLongAt(h + 4, e);
					for (var j = [], k = 0; g > k; k++) j[k] = a.getSLongAt(h + 8 * k, e) / a.getSLongAt(h + 4 + 8 * k, e);
					return j
				}
			}
			function g(a, b) {
				if ("Exif" != a.getStringAt(b, 4)) return i && console.log("Not valid EXIF data! " + a.getStringAt(b, 4)), !1;
				var c, d = b + 6;
				if (18761 == a.getShortAt(d)) c = !1;
				else {
					if (19789 != a.getShortAt(d)) return i && console.log("Not valid TIFF data! (no 0x4949 or 0x4D4D)"), !1;
					c = !0
				}
				if (42 != a.getShortAt(d + 2, c)) return i && console.log("Not valid TIFF data! (no 0x002A)"), !1;
				if (8 != a.getLongAt(d + 4, c)) return i && console.log("Not valid TIFF data! (First offset not 8)", a.getShortAt(d + 4, c)), !1;
				var f = e(a, d, d + 8, EXIF.TiffTags, c);
				if (f.ExifIFDPointer) {
					var g = e(a, d, d + f.ExifIFDPointer, EXIF.Tags, c);
					for (var h in g) {
						switch (h) {
						case "LightSource":
						case "Flash":
						case "MeteringMode":
						case "ExposureProgram":
						case "SensingMethod":
						case "SceneCaptureType":
						case "SceneType":
						case "CustomRendered":
						case "WhiteBalance":
						case "GainControl":
						case "Contrast":
						case "Saturation":
						case "Sharpness":
						case "SubjectDistanceRange":
						case "FileSource":
							g[h] = EXIF.StringValues[h][g[h]];
							break;
						case "ExifVersion":
						case "FlashpixVersion":
							g[h] = String.fromCharCode(g[h][0], g[h][1], g[h][2], g[h][3]);
							break;
						case "ComponentsConfiguration":
							g[h] = EXIF.StringValues.Components[g[h][0]] + EXIF.StringValues.Components[g[h][1]] + EXIF.StringValues.Components[g[h][2]] + EXIF.StringValues.Components[g[h][3]]
						}
						f[h] = g[h]
					}
				}
				if (f.GPSInfoIFDPointer) {
					var j = e(a, d, d + f.GPSInfoIFDPointer, EXIF.GPSTags, c);
					for (var h in j) {
						switch (h) {
						case "GPSVersionID":
							j[h] = j[h][0] + "." + j[h][1] + "." + j[h][2] + "." + j[h][3]
						}
						f[h] = j[h]
					}
				}
				return f
			}
			function h() {
				for (var b = document.getElementsByTagName("img"), c = 0; c < b.length; c++)"true" == b[c].getAttribute("exif") && (b[c].complete ? EXIF.getData(b[c]) : a(b[c], "load", function() {
					EXIF.getData(this)
				}))
			}
			var i = !1;
			EXIF.Tags = {
				36864: "ExifVersion",
				40960: "FlashpixVersion",
				40961: "ColorSpace",
				40962: "PixelXDimension",
				40963: "PixelYDimension",
				37121: "ComponentsConfiguration",
				37122: "CompressedBitsPerPixel",
				37500: "MakerNote",
				37510: "UserComment",
				40964: "RelatedSoundFile",
				36867: "DateTimeOriginal",
				36868: "DateTimeDigitized",
				37520: "SubsecTime",
				37521: "SubsecTimeOriginal",
				37522: "SubsecTimeDigitized",
				33434: "ExposureTime",
				33437: "FNumber",
				34850: "ExposureProgram",
				34852: "SpectralSensitivity",
				34855: "ISOSpeedRatings",
				34856: "OECF",
				37377: "ShutterSpeedValue",
				37378: "ApertureValue",
				37379: "BrightnessValue",
				37380: "ExposureBias",
				37381: "MaxApertureValue",
				37382: "SubjectDistance",
				37383: "MeteringMode",
				37384: "LightSource",
				37385: "Flash",
				37396: "SubjectArea",
				37386: "FocalLength",
				41483: "FlashEnergy",
				41484: "SpatialFrequencyResponse",
				41486: "FocalPlaneXResolution",
				41487: "FocalPlaneYResolution",
				41488: "FocalPlaneResolutionUnit",
				41492: "SubjectLocation",
				41493: "ExposureIndex",
				41495: "SensingMethod",
				41728: "FileSource",
				41729: "SceneType",
				41730: "CFAPattern",
				41985: "CustomRendered",
				41986: "ExposureMode",
				41987: "WhiteBalance",
				41988: "DigitalZoomRation",
				41989: "FocalLengthIn35mmFilm",
				41990: "SceneCaptureType",
				41991: "GainControl",
				41992: "Contrast",
				41993: "Saturation",
				41994: "Sharpness",
				41995: "DeviceSettingDescription",
				41996: "SubjectDistanceRange",
				40965: "InteroperabilityIFDPointer",
				42016: "ImageUniqueID"
			}, EXIF.TiffTags = {
				256: "ImageWidth",
				257: "ImageHeight",
				34665: "ExifIFDPointer",
				34853: "GPSInfoIFDPointer",
				40965: "InteroperabilityIFDPointer",
				258: "BitsPerSample",
				259: "Compression",
				262: "PhotometricInterpretation",
				274: "Orientation",
				277: "SamplesPerPixel",
				284: "PlanarConfiguration",
				530: "YCbCrSubSampling",
				531: "YCbCrPositioning",
				282: "XResolution",
				283: "YResolution",
				296: "ResolutionUnit",
				273: "StripOffsets",
				278: "RowsPerStrip",
				279: "StripByteCounts",
				513: "JPEGInterchangeFormat",
				514: "JPEGInterchangeFormatLength",
				301: "TransferFunction",
				318: "WhitePoint",
				319: "PrimaryChromaticities",
				529: "YCbCrCoefficients",
				532: "ReferenceBlackWhite",
				306: "DateTime",
				270: "ImageDescription",
				271: "Make",
				272: "Model",
				305: "Software",
				315: "Artist",
				33432: "Copyright"
			}, EXIF.GPSTags = {
				0: "GPSVersionID",
				1: "GPSLatitudeRef",
				2: "GPSLatitude",
				3: "GPSLongitudeRef",
				4: "GPSLongitude",
				5: "GPSAltitudeRef",
				6: "GPSAltitude",
				7: "GPSTimeStamp",
				8: "GPSSatellites",
				9: "GPSStatus",
				10: "GPSMeasureMode",
				11: "GPSDOP",
				12: "GPSSpeedRef",
				13: "GPSSpeed",
				14: "GPSTrackRef",
				15: "GPSTrack",
				16: "GPSImgDirectionRef",
				17: "GPSImgDirection",
				18: "GPSMapDatum",
				19: "GPSDestLatitudeRef",
				20: "GPSDestLatitude",
				21: "GPSDestLongitudeRef",
				22: "GPSDestLongitude",
				23: "GPSDestBearingRef",
				24: "GPSDestBearing",
				25: "GPSDestDistanceRef",
				26: "GPSDestDistance",
				27: "GPSProcessingMethod",
				28: "GPSAreaInformation",
				29: "GPSDateStamp",
				30: "GPSDifferential"
			}, EXIF.StringValues = {
				ExposureProgram: {
					0: "Not defined",
					1: "Manual",
					2: "Normal program",
					3: "Aperture priority",
					4: "Shutter priority",
					5: "Creative program",
					6: "Action program",
					7: "Portrait mode",
					8: "Landscape mode"
				},
				MeteringMode: {
					0: "Unknown",
					1: "Average",
					2: "CenterWeightedAverage",
					3: "Spot",
					4: "MultiSpot",
					5: "Pattern",
					6: "Partial",
					255: "Other"
				},
				LightSource: {
					0: "Unknown",
					1: "Daylight",
					2: "Fluorescent",
					3: "Tungsten (incandescent light)",
					4: "Flash",
					9: "Fine weather",
					10: "Cloudy weather",
					11: "Shade",
					12: "Daylight fluorescent (D 5700 - 7100K)",
					13: "Day white fluorescent (N 4600 - 5400K)",
					14: "Cool white fluorescent (W 3900 - 4500K)",
					15: "White fluorescent (WW 3200 - 3700K)",
					17: "Standard light A",
					18: "Standard light B",
					19: "Standard light C",
					20: "D55",
					21: "D65",
					22: "D75",
					23: "D50",
					24: "ISO studio tungsten",
					255: "Other"
				},
				Flash: {
					0: "Flash did not fire",
					1: "Flash fired",
					5: "Strobe return light not detected",
					7: "Strobe return light detected",
					9: "Flash fired, compulsory flash mode",
					13: "Flash fired, compulsory flash mode, return light not detected",
					15: "Flash fired, compulsory flash mode, return light detected",
					16: "Flash did not fire, compulsory flash mode",
					24: "Flash did not fire, auto mode",
					25: "Flash fired, auto mode",
					29: "Flash fired, auto mode, return light not detected",
					31: "Flash fired, auto mode, return light detected",
					32: "No flash function",
					65: "Flash fired, red-eye reduction mode",
					69: "Flash fired, red-eye reduction mode, return light not detected",
					71: "Flash fired, red-eye reduction mode, return light detected",
					73: "Flash fired, compulsory flash mode, red-eye reduction mode",
					77: "Flash fired, compulsory flash mode, red-eye reduction mode, return light not detected",
					79: "Flash fired, compulsory flash mode, red-eye reduction mode, return light detected",
					89: "Flash fired, auto mode, red-eye reduction mode",
					93: "Flash fired, auto mode, return light not detected, red-eye reduction mode",
					95: "Flash fired, auto mode, return light detected, red-eye reduction mode"
				},
				SensingMethod: {
					1: "Not defined",
					2: "One-chip color area sensor",
					3: "Two-chip color area sensor",
					4: "Three-chip color area sensor",
					5: "Color sequential area sensor",
					7: "Trilinear sensor",
					8: "Color sequential linear sensor"
				},
				SceneCaptureType: {
					0: "Standard",
					1: "Landscape",
					2: "Portrait",
					3: "Night scene"
				},
				SceneType: {
					1: "Directly photographed"
				},
				CustomRendered: {
					0: "Normal process",
					1: "Custom process"
				},
				WhiteBalance: {
					0: "Auto white balance",
					1: "Manual white balance"
				},
				GainControl: {
					0: "None",
					1: "Low gain up",
					2: "High gain up",
					3: "Low gain down",
					4: "High gain down"
				},
				Contrast: {
					0: "Normal",
					1: "Soft",
					2: "Hard"
				},
				Saturation: {
					0: "Normal",
					1: "Low saturation",
					2: "High saturation"
				},
				Sharpness: {
					0: "Normal",
					1: "Soft",
					2: "Hard"
				},
				SubjectDistanceRange: {
					0: "Unknown",
					1: "Macro",
					2: "Close view",
					3: "Distant view"
				},
				FileSource: {
					3: "DSC"
				},
				Components: {
					0: "",
					1: "Y",
					2: "Cb",
					3: "Cr",
					4: "R",
					5: "G",
					6: "B"
				}
			}, EXIF.getData = function(a, d) {
				return a.complete ? (b(a) ? d && d() : c(a, d), !0) : !1
			}, EXIF.getTag = function(a, c) {
				return b(a) ? a.exifdata[c] : void 0
			}, EXIF.getAllTags = function(a) {
				if (!b(a)) return {};
				var c = a.exifdata,
					d = {};
				for (var e in c) c.hasOwnProperty(e) && (d[e] = c[e]);
				return d
			}, EXIF.pretty = function(a) {
				if (!b(a)) return "";
				var c = a.exifdata,
					d = "";
				for (var e in c) c.hasOwnProperty(e) && (d += "object" == typeof c[e] ? e + " : [" + c[e].length + " values]\r\n" : e + " : " + c[e] + "\r\n");
				return d
			}, EXIF.readFromBinaryFile = function(a) {
				return d(a)
			}, a(window, "load", h)
		}()
	}(), function() {
		window.BinaryFile = function(a, b, c) {
			var d = a,
				e = b || 0,
				f = 0;
			this.getRawData = function() {
				return d
			}, "string" == typeof a ? (f = c || d.length, this.getByteAt = function(a) {
				return 255 & d.charCodeAt(a + e)
			}, this.getBytesAt = function(a, b) {
				for (var c = [], f = 0; b > f; f++) c[f] = 255 & d.charCodeAt(a + f + e);
				return c
			}) : "unknown" == typeof a && (f = c || IEBinary_getLength(d), this.getByteAt = function(a) {
				return IEBinary_getByteAt(d, a + e)
			}, this.getBytesAt = function(a, b) {
				return new VBArray(IEBinary_getBytesAt(d, a + e, b)).toArray()
			}), this.getLength = function() {
				return f
			}, this.getSByteAt = function(a) {
				var b = this.getByteAt(a);
				return b > 127 ? b - 256 : b
			}, this.getShortAt = function(a, b) {
				var c = b ? (this.getByteAt(a) << 8) + this.getByteAt(a + 1) : (this.getByteAt(a + 1) << 8) + this.getByteAt(a);
				return 0 > c && (c += 65536), c
			}, this.getSShortAt = function(a, b) {
				var c = this.getShortAt(a, b);
				return c > 32767 ? c - 65536 : c
			}, this.getLongAt = function(a, b) {
				var c = this.getByteAt(a),
					d = this.getByteAt(a + 1),
					e = this.getByteAt(a + 2),
					f = this.getByteAt(a + 3),
					g = b ? (((c << 8) + d << 8) + e << 8) + f : (((f << 8) + e << 8) + d << 8) + c;
				return 0 > g && (g += 4294967296), g
			}, this.getSLongAt = function(a, b) {
				var c = this.getLongAt(a, b);
				return c > 2147483647 ? c - 4294967296 : c
			}, this.getStringAt = function(a, b) {
				for (var c = [], d = this.getBytesAt(a, b), e = 0; b > e; e++) c[e] = String.fromCharCode(d[e]);
				return c.join("")
			}, this.getCharAt = function(a) {
				return String.fromCharCode(this.getByteAt(a))
			}, this.toBase64 = function() {
				
				return window.btoa(d)
			}, this.fromBase64 = function(a) {
				
				d = window.atob(a)
			}
		};
		!
		function() {
			function a() {
				var a = null;
				return window.ActiveXObject ? a = new ActiveXObject("Microsoft.XMLHTTP") : window.XMLHttpRequest && (a = new XMLHttpRequest), a
			}
			function b(b, c, d) {
				var e = a();
				e ? (c && ("undefined" != typeof e.onload ? e.onload = function() {
					"200" == e.status ? c(this) : d && d(), e = null
				} : e.onreadystatechange = function() {
					4 == e.readyState && ("200" == e.status ? c(this) : d && d(), e = null)
				}), e.open("HEAD", b, !0), e.send(null)) : d && d()
			}
			function c(b, c, d, e, f, g) {
				var h = a();
				if (h) {
					var i = 0;
					e && !f && (i = e[0]);
					var j = 0;
					e && (j = e[1] - e[0] + 1), c && ("undefined" != typeof h.onload ? h.onload = function() {
						"200" == h.status || "206" == h.status || "0" == h.status ? (h.binaryResponse = new BinaryFile(h.responseText, i, j), h.fileSize = g || h.getResponseHeader("Content-Length"), c(h)) : d && d(), h = null
					} : h.onreadystatechange = function() {
						if (4 == h.readyState) {
							if ("200" == h.status || "206" == h.status || "0" == h.status) {
								var a = {
									status: h.status,
									binaryResponse: new BinaryFile("unknown" == typeof h.responseBody ? h.responseBody : h.responseText, i, j),
									fileSize: g || h.getResponseHeader("Content-Length")
								};
								c(a)
							} else d && d();
							h = null
						}
					}), h.open("GET", b, !0), h.overrideMimeType && h.overrideMimeType("text/plain; charset=x-user-defined"), e && f && h.setRequestHeader("Range", "bytes=" + e[0] + "-" + e[1]), h.setRequestHeader("If-Modified-Since", "Sat, 1 Jan 1970 00:00:00 GMT"), h.send(null)
				} else d && d()
			}
			return function(a, d, e, f) {
				f ? b(a, function(b) {
					var g, h, i = parseInt(b.getResponseHeader("Content-Length"), 10),
						j = b.getResponseHeader("Accept-Ranges");
					g = f[0], f[0] < 0 && (g += i), h = g + f[1] - 1, c(a, d, e, [g, h], "bytes" == j, i)
				}) : c(a, d, e)
			}
		}();
		document.write("<script type='text/vbscript'>\r\nFunction IEBinary_getByteAt(strBinary, iOffset)\r\n	IEBinary_getByteAt = AscB(MidB(strBinary, iOffset + 1, 1))\r\nEnd Function\r\nFunction IEBinary_getBytesAt(strBinary, iOffset, iLength)\r\n  Dim aBytes()\r\n  ReDim aBytes(iLength - 1)\r\n  For i = 0 To iLength - 1\r\n   aBytes(i) = IEBinary_getByteAt(strBinary, iOffset + i)\r\n  Next\r\n  IEBinary_getBytesAt = aBytes\r\nEnd Function\r\nFunction IEBinary_getLength(strBinary)\r\n	IEBinary_getLength = LenB(strBinary)\r\nEnd Function\r\n</script>\r\n")
	}(), function() {
		!
		function(a) {
			function b(b) {
				var c = b.ua = navigator.userAgent;
				b.isWebKit = /webkit/i.test(c), b.isMozilla = /mozilla/i.test(c), b.isIE = /msie/i.test(c), b.isFirefox = /firefox/i.test(c), b.isChrome = /chrome/i.test(c), b.isSafari = /safari/i.test(c) && !this.isChrome, b.isMobile = /mobile/i.test(c), b.isOpera = /opera/i.test(c), b.isIOS = /ios/i.test(c), b.isIpad = /ipad/i.test(c), b.isIpod = /ipod/i.test(c), b.isIphone = /iphone/i.test(c) && !this.isIpod, b.isAndroid = /android/i.test(c), b.supportStorage = "localStorage" in a, b.supportOrientation = "orientation" in a, b.supportDeviceMotion = "ondevicemotion" in a, b.supportTouch = "ontouchstart" in a, b.supportCanvas = null != document.createElement("canvas").getContext, b.cssPrefix = b.isWebKit ? "webkit" : b.isFirefox ? "Moz" : b.isOpera ? "O" : b.isIE ? "ms" : ""
			}
			function c(a, b, c) {
				for (var d, e, f, g, h, i, j, k, l, m = a.length, n = b.length, o = {
					x: 0,
					y: 0
				}, p = 0; m > p; p++) {
					d = a[p], e = a[m - 1 > p ? p + 1 : 0], o.x = d.y - e.y, o.y = e.x - d.x, f = Math.sqrt(o.x * o.x + o.y * o.y), o.x /= f, o.y /= f, g = h = a[0].x * o.x + a[0].y * o.y;
					for (var q = 1; m > q; q++) k = a[q].x * o.x + a[q].y * o.y, k > h ? h = k : g > k && (g = k);
					for (i = j = b[0].x * o.x + b[0].y * o.y, q = 1; n > q; q++) k = b[q].x * o.x + b[q].y * o.y, k > j ? j = k : i > k && (i = k);
					if (i > g ? (l = i - h, o.x = -o.x, o.y = -o.y) : l = g - j, l >= 0) return !1;
					l > c.overlap && (c.overlap = l, c.normal.x = o.x, c.normal.y = o.y)
				}
				return c
			}
			var d = a.Quark = a.Quark || {
				global: a
			},
				e = function() {};
			d.inherit = function(a, b) {
				e.prototype = b.prototype, a.superClass = b.prototype, a.prototype = new e, a.prototype.constructor = a
			}, d.merge = function(a, b, c) {
				for (var d in b)(!c || a.hasOwnProperty(d) || void 0 !== a[d]) && (a[d] = b[d]);
				return a
			}, d.delegate = function(b, c) {
				var d = c || a;
				if (arguments.length > 2) {
					var e = Array.prototype.slice.call(arguments, 2);
					return function() {
						var a = Array.prototype.concat.apply(e, arguments);
						return b.apply(d, a)
					}
				}
				return function() {
					return b.apply(d, arguments)
				}
			}, d.getDOM = function(a) {
				return document.getElementById(a)
			}, d.createDOM = function(a, b) {
				var c = document.createElement(a);
				for (var d in b) {
					var e = b[d];
					if ("style" == d) for (var f in e) c.style[f] = e[f];
					else c[d] = e
				}
				return c
			}, d.use = function(b) {
				for (var c = b.split("."), d = a, e = 0; e < c.length; e++) {
					var f = c[e];
					d = d[f] || (d[f] = {})
				}
				return d
			}, b(d), d.getElementOffset = function(a) {
				for (var b = a.offsetLeft, c = a.offsetTop;
				(a = a.offsetParent) && a != document.body && a != document;) b += a.offsetLeft, c += a.offsetTop;
				return {
					left: b,
					top: c
				}
			}, d.createDOMDrawable = function(a, b) {
				var c = a.tagName || "div",
					e = b.image,
					f = a.width || e && e.width,
					g = a.height || e && e.height,
					h = d.createDOM(c);
				if (a.id && (h.id = a.id), h.style.position = "absolute", h.style.left = (a.left || 0) + "px", h.style.top = (a.top || 0) + "px", h.style.width = f + "px", h.style.height = g + "px", "canvas" == c) {
					if (h.width = f, h.height = g, e) {
						var i = h.getContext("2d"),
							j = b.rect || [0, 0, f, g];
						i.drawImage(e, j[0], j[1], j[2], j[3], a.x || 0, a.y || 0, a.width || j[2], a.height || j[3])
					}
				} else if (h.style.opacity = void 0 != a.alpha ? a.alpha : 1, h.style.overflow = "hidden", e && e.src) {
					h.style.backgroundImage = "url(" + e.src + ")";
					var k = a.rectX || 0,
						l = a.rectY || 0;
					h.style.backgroundPosition = -k + "px " + -l + "px"
				}
				return h
			}, d.DEG_TO_RAD = Math.PI / 180, d.RAD_TO_DEG = 180 / Math.PI, d.hitTestPoint = function(a, b, c, d) {
				var e = a.getBounds(),
					f = e.length,
					g = b >= e.x && b <= e.x + e.width && c >= e.y && c <= e.y + e.height;
				if (g && d) {
					for (var h, i, j, k, l = 0, m = !1, n = 0; f > n; n++) {
						var o = e[n],
							p = e[(n + 1) % f];
						if (o.y == p.y && c == o.y && (o.x > p.x ? (h = p.x, i = o.x) : (h = o.x, i = p.x), b >= h && i >= b)) m = !0;
						else if (o.y > p.y ? (j = p.y, k = o.y) : (j = o.y, k = p.y), !(j > c || c > k)) {
							var q = (c - o.y) * (p.x - o.x) / (p.y - o.y) + o.x;
							q > b ? l++ : q == b && (m = !0)
						}
					}
					return m ? 0 : l % 2 == 1 ? 1 : -1
				}
				return g ? 1 : -1
			}, d.hitTestObject = function(a, b, c) {
				var e = a.getBounds(),
					f = b.getBounds(),
					g = e.x <= f.x + f.width && f.x <= e.x + e.width && e.y <= f.y + f.height && f.y <= e.y + e.height;
				return g && c ? (g = d.polygonCollision(f, f), g !== !1) : g
			}, d.polygonCollision = function(a, b) {
				var d = c(a, b, {
					overlap: -1 / 0,
					normal: {
						x: 0,
						y: 0
					}
				});
				return d ? c(b, a, d) : !1
			}, d.toString = function() {
				return "Quark"
			}, d.trace = function() {
				var a = Array.prototype.slice.call(arguments);
				"undefined" != typeof console && "undefined" != typeof console.log && console.log(a.join(" "))
			}, void 0 == a.Q && (a.Q = d), void 0 == a.trace && (a.trace = d.trace)
		}(window), function() {
			var a = Quark.Matrix = function(a, b, c, d, e, f) {
					this.a = a, this.b = b, this.c = c, this.d = d, this.tx = e, this.ty = f
				};
			a.prototype.concat = function(a) {
				var b = this.a,
					c = this.c,
					d = this.tx;
				return this.a = b * a.a + this.b * a.c, this.b = b * a.b + this.b * a.d, this.c = c * a.a + this.d * a.c, this.d = c * a.b + this.d * a.d, this.tx = d * a.a + this.ty * a.c + a.tx, this.ty = d * a.b + this.ty * a.d + a.ty, this
			}, a.prototype.rotate = function(a) {
				var b = Math.cos(a),
					c = Math.sin(a),
					d = this.a,
					e = this.c,
					f = this.tx;
				return this.a = d * b - this.b * c, this.b = d * c + this.b * b, this.c = e * b - this.d * c, this.d = e * c + this.d * b, this.tx = f * b - this.ty * c, this.ty = f * c + this.ty * b, this
			}, a.prototype.scale = function(a, b) {
				return this.a *= a, this.d *= b, this.tx *= a, this.ty *= b, this
			}, a.prototype.translate = function(a, b) {
				return this.tx += a, this.ty += b, this
			}, a.prototype.identity = function() {
				return this.a = this.d = 1, this.b = this.c = this.tx = this.ty = 0, this
			}, a.prototype.invert = function() {
				var a = this.a,
					b = this.b,
					c = this.c,
					d = this.d,
					e = this.tx,
					f = a * d - b * c;
				return this.a = d / f, this.b = -b / f, this.c = -c / f, this.d = a / f, this.tx = (c * this.ty - d * e) / f, this.ty = -(a * this.ty - b * e) / f, this
			}, a.prototype.transformPoint = function(a, b, c) {
				var d = a.x * this.a + a.y * this.c + this.tx,
					e = a.x * this.b + a.y * this.d + this.ty;
				return b && (d = d + .5 >> 0, e = e + .5 >> 0), c ? {
					x: d,
					y: e
				} : (a.x = d, a.y = e, a)
			}, a.prototype.clone = function() {
				return new a(this.a, this.b, this.c, this.d, this.tx, this.ty)
			}, a.prototype.toString = function() {
				return "(a=" + this.a + ", b=" + this.b + ", c=" + this.c + ", d=" + this.d + ", tx=" + this.tx + ", ty=" + this.ty + ")"
			}
		}(), function() {
			var a = Quark.Rectangle = function(a, b, c, d) {
					this.x = a, this.y = b, this.width = c, this.height = d
				};
			a.prototype.intersects = function(a) {
				return this.x <= a.x + a.width && a.x <= this.x + this.width && this.y <= a.y + a.height && a.y <= this.y + this.height
			}, a.prototype.intersection = function(b) {
				var c = Math.max(this.x, b.x),
					d = Math.min(this.x + this.width, b.x + b.width);
				if (d >= c) {
					var e = Math.max(this.y, b.y),
						f = Math.min(this.y + this.height, b.y + b.height);
					if (f >= e) return new a(c, e, d - c, f - e)
				}
				return null
			}, a.prototype.union = function(b, c) {
				var d = Math.max(this.x + this.width, b.x + b.width),
					e = Math.max(this.y + this.height, b.y + b.height),
					f = Math.min(this.x, b.x),
					g = Math.min(this.y, b.y),
					h = d - f,
					i = e - g;
				return c ? new a(f, g, h, i) : (this.x = f, this.y = g, this.width = h, this.height = i, void 0)
			}, a.prototype.containsPoint = function(a, b) {
				return this.x <= a && a <= this.x + this.width && this.y <= b && b <= this.y + this.height
			}, a.prototype.clone = function() {
				return new a(this.x, this.y, this.width, this.height)
			}, a.prototype.toString = function() {
				return "(x=" + this.x + ", y=" + this.y + ", width=" + this.width + ", height=" + this.height + ")"
			}
		}(), function() {
			Quark.KEY = {
				MOUSE_LEFT: 1,
				MOUSE_MID: 2,
				MOUSE_RIGHT: 3,
				BACKSPACE: 8,
				TAB: 9,
				NUM_CENTER: 12,
				ENTER: 13,
				RETURN: 13,
				SHIFT: 16,
				CTRL: 17,
				ALT: 18,
				PAUSE: 19,
				CAPS_LOCK: 20,
				ESC: 27,
				ESCAPE: 27,
				SPACE: 32,
				PAGE_UP: 33,
				PAGE_DOWN: 34,
				END: 35,
				HOME: 36,
				LEFT: 37,
				UP: 38,
				RIGHT: 39,
				DOWN: 40,
				PRINT_SCREEN: 44,
				INSERT: 45,
				DELETE: 46,
				ZERO: 48,
				ONE: 49,
				TWO: 50,
				THREE: 51,
				FOUR: 52,
				FIVE: 53,
				SIX: 54,
				SEVEN: 55,
				EIGHT: 56,
				NINE: 57,
				A: 65,
				B: 66,
				C: 67,
				D: 68,
				E: 69,
				F: 70,
				G: 71,
				H: 72,
				I: 73,
				J: 74,
				K: 75,
				L: 76,
				M: 77,
				N: 78,
				O: 79,
				P: 80,
				Q: 81,
				R: 82,
				S: 83,
				T: 84,
				U: 85,
				V: 86,
				W: 87,
				X: 88,
				Y: 89,
				Z: 90,
				CONTEXT_MENU: 93,
				NUM_ZERO: 96,
				NUM_ONE: 97,
				NUM_TWO: 98,
				NUM_THREE: 99,
				NUM_FOUR: 100,
				NUM_FIVE: 101,
				NUM_SIX: 102,
				NUM_SEVEN: 103,
				NUM_EIGHT: 104,
				NUM_NINE: 105,
				NUM_MULTIPLY: 106,
				NUM_PLUS: 107,
				NUM_MINUS: 109,
				NUM_PERIOD: 110,
				NUM_DIVISION: 111,
				F1: 112,
				F2: 113,
				F3: 114,
				F4: 115,
				F5: 116,
				F6: 117,
				F7: 118,
				F8: 119,
				F9: 120,
				F10: 121,
				F11: 122,
				F12: 123
			}
		}(), function() {
			var a = Quark.EventManager = function() {
					this.keyState = {}, this._evtHandlers = {}
				};
			a.prototype.registerStage = function(a, b, c, d) {
				this.register(a.context.canvas, b, {
					host: a,
					func: a.dispatchEvent
				}, c, d)
			}, a.prototype.unregisterStage = function(a, b) {
				this.unregister(a.context.canvas, b, a.dispatchEvent)
			}, a.prototype.register = function(a, b, c, d, e) {
				(null == c || "function" == typeof c) && (c = {
					host: null,
					func: c
				});
				for (var f = {
					prevent: d,
					stop: e
				}, g = this, h = function(a) {
						g._onEvent(a, f, c)
					}, i = 0; i < b.length; i++) {
					for (var j = b[i], k = this._evtHandlers[j] || (this._evtHandlers[j] = []), l = 0, m = !1; l < k.length; l++) {
						var n = k[l];
						if (n.target == a && n.callback.func == c.func) {
							trace("duplicate callback"), m = !0;
							break
						}
					}
					m || (k.push({
						target: a,
						callback: c,
						handler: h
					}), a.addEventListener(j, h, !1))
				}
			}, a.prototype.unregister = function(a, b, c) {
				for (var d = 0; d < b.length; d++) for (var e = b[d], f = this._evtHandlers[e], g = 0; g < f.length; g++) {
					var h = f[g];
					if (h.target == a && (h.callback.func == c || null == c)) {
						a.removeEventListener(e, h.handler), f.splice(g, 1);
						break
					}
				}
			}, a.prototype._onEvent = function(b, c, d) {
				var e = b,
					f = b.type,
					g = 0 == b.type.indexOf("touch");
				g && (e = b.touches && b.touches.length > 0 ? b.touches[0] : b.changedTouches && b.changedTouches.length > 0 ? b.changedTouches[0] : b, e.type = f, e.rawEvent = b), ("keydown" == f || "keyup" == f || "keypress" == f) && (this.keyState[b.keyCode] = f), null != d.func && d.func.call(d.host, e), a.stop(b, !c.prevent, !c.stop)
			}, a.stop = function(a, b, c) {
				b || a.preventDefault(), c || (a.stopPropagation(), a.stopImmediatePropagation && a.stopImmediatePropagation())
			}
		}(), function() {
			var a = Quark.EventDispatcher = function() {
					this._eventMap = {}
				};
			a.prototype.addEventListener = function(a, b) {
				var c = this._eventMap[a];
				return null == c && (c = this._eventMap[a] = []), -1 == c.indexOf(b) ? (c.push(b), !0) : !1
			}, a.prototype.removeEventListener = function(a, b) {
				if (1 == arguments.length) return this.removeEventListenerByType(a);
				var c = this._eventMap[a];
				if (null == c) return !1;
				for (var d = 0; d < c.length; d++) {
					var e = c[d];
					if (e === b) return c.splice(d, 1), 0 == c.length && delete this._eventMap[a], !0
				}
				return !1
			}, a.prototype.removeEventListenerByType = function(a) {
				var b = this._eventMap[a];
				return null != b ? (delete this._eventMap[a], !0) : !1
			}, a.prototype.removeAllEventListeners = function() {
				this._eventMap = {}
			}, a.prototype.dispatchEvent = function(a) {
				var b = this._eventMap[a.type];
				if (null == b) return !1;
				a.target || (a.target = this), b = b.slice();
				for (var c = 0; c < b.length; c++) {
					var d = b[c];
					"function" == typeof d && d.call(this, a)
				}
				return !0
			}, a.prototype.hasEventListener = function(a) {
				var b = this._eventMap[a];
				return null != b && b.length > 0
			}, a.prototype.on = a.prototype.addEventListener, a.prototype.un = a.prototype.removeEventListener, a.prototype.fire = a.prototype.dispatchEvent
		}(), function() {
			var a = Quark.Context = function(a) {
					if (null == a.canvas) throw "Quark.Context Error: canvas is required.";
					this.canvas = null, Quark.merge(this, a)
				};
			a.prototype.startDraw = function() {}, a.prototype.draw = function() {}, a.prototype.endDraw = function() {}, a.prototype.transform = function() {}, a.prototype.remove = function() {}
		}(), function() {
			var a = Quark.CanvasContext = function(b) {
					a.superClass.constructor.call(this, b), this.context = this.canvas.getContext("2d")
				};
			Quark.inherit(a, Quark.Context), a.prototype.startDraw = function() {
				this.context.save()
			}, a.prototype.draw = function(a) {
				if (null == a.parent || null == a.parent.mask) if (null != a.mask) {
					var b = a.width,
						c = a.height,
						d = Q._helpContext,
						e = d.canvas,
						f = d.context;
					e.width = 0, e.width = b, e.height = c, d.startDraw(), a.mask._render(d), f.globalCompositeOperation = "source-in";
					var g = a.mask;
					if (a.mask = null, a instanceof Quark.DisplayObjectContainer) {
						var h = a._cache || Quark.cacheObject(a);
						f.drawImage(h, 0, 0, b, c, 0, 0, b, c)
					} else a.render(d);
					d.endDraw(), a.mask = g, arguments[0] = e, this.context.drawImage.apply(this.context, arguments)
				} else if (null != a._cache) this.context.drawImage(a._cache, 0, 0);
				else if (a instanceof Quark.Graphics || a instanceof Quark.Text) a._draw(this.context);
				else {
					var i = a.getDrawable(this);
					null != i && (arguments[0] = i, this.context.drawImage.apply(this.context, arguments))
				}
			}, a.prototype.endDraw = function() {
				this.context.restore()
			}, a.prototype.transform = function(a) {
				var b = this.context;
				a instanceof Q.Stage ? (a._scaleX != a.scaleX && (a._scaleX = a.scaleX, this.canvas.style.width = a._scaleX * a.width + "px"), a._scaleY != a.scaleY && (a._scaleY = a.scaleY, this.canvas.style.height = a._scaleY * a.height + "px")) : ((0 != a.x || 0 != a.y) && b.translate(a.x, a.y), a.rotation % 360 != 0 && b.rotate(a.rotation % 360 * Quark.DEG_TO_RAD), (1 != a.scaleX || 1 != a.scaleY) && b.scale(a.scaleX, a.scaleY), (0 != a.regX || 0 != a.regY) && b.translate(-a.regX, -a.regY)), a.alpha > 0 && (b.globalAlpha *= a.alpha)
			}, a.prototype.clear = function(a, b, c, d) {
				this.context.clearRect(a, b, c, d)
			}
		}(), function() {
			function a(a, b) {
				var c = "";
				return c += b ? "translate3d(" + (a.x - a.regX) + "px, " + (a.y - a.regY) + "px, 0px)rotate3d(0, 0, 1, " + a.rotation + "deg)scale3d(" + a.scaleX + ", " + a.scaleY + ", 1)" : "translate(" + (a.x - a.regX) + "px, " + (a.y - a.regY) + "px)rotate(" + a.rotation + "deg)scale(" + a.scaleX + ", " + a.scaleY + ")"
			}
			var b = document.createElement("div"),
				c = void 0 != b.style[Quark.cssPrefix + "Transform"],
				d = void 0 != b.style[Quark.cssPrefix + "Perspective"],
				e = document.documentElement;
			if (d && "webkitPerspective" in e.style) {
				b.id = "test3d";
				var f = document.createElement("style");
				f.textContent = "@media (-webkit-transform-3d){#test3d{height:3px}}", document.head.appendChild(f), e.appendChild(b), d = 3 === b.offsetHeight, f.parentNode.removeChild(f), b.parentNode.removeChild(b)
			}
			if (Quark.supportTransform = c, Quark.supportTransform3D = d, !c) return void trace("Warn: DOMContext requires css transfrom support.");
			var g = Quark.DOMContext = function(a) {
					g.superClass.constructor.call(this, a)
				};
			Quark.inherit(g, Quark.Context), g.prototype.draw = function(a) {
				if (!a._addedToDOM) {
					var b = a.parent,
						c = a.getDrawable(this);
					if (null != b) {
						var d = b.getDrawable(this);
						c.parentNode != d && d.appendChild(c), null == d.parentNode && b instanceof Quark.Stage && (this.canvas.appendChild(d), b._addedToDOM = !0), a._addedToDOM = !0
					}
				}
			}, g.prototype.transform = function(b) {
				var c = b.getDrawable(this);
				if (b.transformEnabled || !b._addedToDOM) {
					var d = Quark.cssPrefix,
						e = d + "TransformOrigin",
						f = d + "Transform",
						g = c.style;
					if ((!g.display || b.propChanged("visible", "alpha")) && (g.display = !b.visible || b.alpha <= 0 ? "none" : ""), (!g.opacity || b.propChanged("alpha")) && (g.opacity = b.alpha), (!g.backgroundPosition || b.propChanged("rectX", "rectY")) && (g.backgroundPosition = -b.rectX + "px " + -b.rectY + "px"), (!g.width || b.propChanged("width", "height")) && (g.width = b.width + "px", g.height = b.height + "px"), (!g[e] || b.propChanged("regX", "regY")) && (g[e] = b.regX + "px " + b.regY + "px"), !g[f] || b.propChanged("x", "y", "regX", "regY", "scaleX", "scaleY", "rotation")) {
						var h = Quark.supportTransform3D ? a(b, !0) : a(b, !1);
						g[f] = h
					}(!g.zIndex || b.propChanged("_depth")) && (g.zIndex = b._depth), null != b.mask && (g[Q.cssPrefix + "MaskImage"] = b.mask.getDrawable(this).style.backgroundImage, g[Q.cssPrefix + "MaskRepeat"] = "no-repeat", g[Q.cssPrefix + "MaskPosition"] = b.mask.x + "px " + b.mask.y + "px"), g.pointerEvents = b.eventEnabled ? "auto" : "none"
				}
			}, g.prototype.hide = function(a) {
				a.getDrawable(this).style.display = "none"
			}, g.prototype.remove = function(a) {
				var b = a.getDrawable(this),
					c = b.parentNode;
				null != c && c.removeChild(b), a._addedToDOM = !1
			}
		}(), function() {
			var a = Quark.UIDUtil = {
				_counter: 0
			};
			a.createUID = function(a) {
				var b = a.charCodeAt(a.length - 1);
				return b >= 48 && 57 >= b && (a += "_"), a + this._counter++
			}, a.displayObjectToString = function(a) {
				for (var b, c = a; null != c; c = c.parent) {
					var d = null != c.id ? c.id : c.name;
					if (b = null == b ? d : d + "." + b, c == c.parent) break
				}
				return b
			}
		}(), function() {
			function a(b, c) {
				for (var d = 0; d < b.children.length; d++) {
					var e = b.children[d];
					if (e.children) a(e, c);
					else if (null != c) {
						var f = e.getBounds();
						c.globalAlpha = .2, c.beginPath();
						var g = f[0];
						c.moveTo(g.x - .5, g.y - .5);
						for (var h = 1; h < f.length; h++) {
							var i = f[h];
							c.lineTo(i.x - .5, i.y - .5)
						}
						c.lineTo(g.x - .5, g.y - .5), c.stroke(), c.closePath(), c.globalAlpha = .5, c.beginPath(), c.rect((f.x >> 0) - .5, (f.y >> 0) - .5, f.width >> 0, f.height >> 0), c.stroke(), c.closePath()
					} else e.drawable.domDrawable && (e.drawable.domDrawable.style.border = "1px solid #f00")
				}
			}
			Quark.getUrlParams = function() {
				var a = {},
					b = window.location.href,
					c = b.indexOf("?");
				if (c > 0) for (var d, e, f = b.substring(c + 1), g = f.split("&"), h = 0; d = g[h]; h++) e = g[h] = d.split("="), a[e[0]] = e.length > 1 ? e[1] : !0;
				return a
			};
			var b = document.getElementsByTagName("head")[0],
				c = b.getElementsByTagName("meta"),
				d = c.length > 0 ? c[c.length - 1].nextSibling : b.childNodes[0];
			Quark.addMeta = function(a) {
				var c = document.createElement("meta");
				for (var e in a) c.setAttribute(e, a[e]);
				b.insertBefore(c, d)
			}, Quark.toggleDebugRect = function(b) {
				b.debug = !b.debug, b._render = b.debug ?
				function(c) {
					null != c.clear && c.clear(0, 0, b.width, b.height), Quark.Stage.superClass._render.call(b, c);
					var d = b.context.context;
					null != d && (d.save(), d.lineWidth = 1, d.strokeStyle = "#f00", d.globalAlpha = .5), a(b, d), null != d && d.restore()
				} : function(a) {
					null != a.clear && a.clear(0, 0, b.width, b.height), Quark.Stage.superClass._render.call(b, a)
				}
			}, Quark.cacheObject = function(a, b, c) {
				var d = a.width,
					e = a.height,
					f = a.mask,
					g = Quark.createDOM("canvas", {
						width: d,
						height: e
					}),
					h = new Quark.CanvasContext({
						canvas: g
					});
				if (a.mask = null, a.render(h), a.mask = f, b) {
					var i = new Image;
					return i.width = d, i.height = e, i.src = g.toDataURL(c || "image/png"), i
				}
				return g
			}, Quark._helpContext = new Quark.CanvasContext({
				canvas: Quark.createDOM("canvas")
			})
		}(), function() {
			var a = Quark.Timer = function(a) {
					this.interval = a || 50, this.paused = !1, this.info = {
						lastTime: 0,
						currentTime: 0,
						deltaTime: 0,
						realDeltaTime: 0
					}, this._startTime = 0, this._intervalID = null, this._listeners = []
				};
			a.prototype.start = function() {
				if (null == this._intervalID) {
					this._startTime = this.info.lastTime = this.info.currentTime = Date.now();
					var a = this,
						b = function() {
							a._intervalID = setTimeout(b, a.interval), a._run()
						};
					b()
				}
			}, a.prototype.stop = function() {
				clearTimeout(this._intervalID), this._intervalID = null, this._startTime = 0
			}, a.prototype.pause = function() {
				this.paused = !0
			}, a.prototype.resume = function() {
				this.paused = !1
			}, a.prototype._run = function() {
				if (!this.paused) {
					var a = this.info,
						b = a.currentTime = Date.now();
					a.deltaTime = a.realDeltaTime = b - a.lastTime;
					for (var c, d, e = 0, f = this._listeners.length; f > e; e++) c = this._listeners[e], d = c.__runTime || 0, 0 == d ? c.step(this.info) : b > d && (c.step(this.info), this._listeners.splice(e, 1), e--, f--);
					a.lastTime = b
				}
			}, a.prototype.delay = function(a, b) {
				var c = {
					step: a,
					__runTime: Date.now() + b
				};
				this.addListener(c)
			}, a.prototype.addListener = function(a) {
				if (null == a || "function" != typeof a.step) throw "Timer Error: The listener object must implement a step() method!";
				this._listeners.push(a)
			}, a.prototype.removeListener = function(a) {
				var b = this._listeners.indexOf(a);
				b > -1 && this._listeners.splice(b, 1)
			}
		}(), function() {
			var a = Quark.ImageLoader = function(b) {
					a.superClass.constructor.call(this), this.loading = !1, this._index = -1, this._loaded = 0, this._images = {}, this._totalSize = 0, this._loadHandler = Quark.delegate(this._loadHandler, this), this._addSource(b)
				};
			Quark.inherit(a, Quark.EventDispatcher), a.prototype.load = function(a) {
				this._addSource(a), this.loading || this._loadNext()
			}, a.prototype._addSource = function(a) {
				if (a) {
					a = a instanceof Array ? a : [a];
					for (var b = 0; b < a.length; b++) this._totalSize += a[b].size || 0;
					this._source = this._source ? this._source.concat(a) : a
				}
			}, a.prototype._loadNext = function() {
				if (this._index++, this._index >= this._source.length) return this.dispatchEvent({
					type: "complete",
					target: this,
					images: this._images
				}), this._source = [], this.loading = !1, void(this._index = -1);
				var a = new Image;
				a.onload = this._loadHandler, a.src = this._source[this._index].src, this.loading = !0
			}, a.prototype._loadHandler = function(a) {
				this._loaded++;
				var b = this._source[this._index];
				b.image = a.target;
				var c = b.id || b.src;
				this._images[c] = b, this.dispatchEvent({
					type: "loaded",
					target: this,
					image: b
				}), this._loadNext()
			}, a.prototype.getLoaded = function() {
				return this._loaded
			}, a.prototype.getTotal = function() {
				return this._source.length
			}, a.prototype.getLoadedSize = function() {
				var a = 0;
				for (var b in this._images) {
					var c = this._images[b];
					a += c.size || 0
				}
				return a
			}, a.prototype.getTotalSize = function() {
				return this._totalSize
			}
		}(), function() {
			var a = Quark.Tween = function(a, c, d) {
					this.target = a, this.time = 0, this.delay = 0, this.paused = !1, this.loop = !1, this.reverse = !1, this.interval = 0, this.ease = b.Linear.EaseNone, this.next = null, this.onStart = null, this.onUpdate = null, this.onComplete = null, this._oldProps = {}, this._newProps = {}, this._deltaProps = {}, this._startTime = 0, this._lastTime = 0, this._pausedTime = 0, this._pausedStartTime = 0, this._reverseFlag = 1, this._frameTotal = 0, this._frameCount = 0;
					for (var e in c) {
						var f = a[e],
							g = c[e];
						void 0 !== f && "number" == typeof f && "number" == typeof g && (this._oldProps[e] = f, this._newProps[e] = g, this._deltaProps[e] = g - f)
					}
					for (var e in d) this[e] = d[e]
				};
			a.prototype.setProps = function(a, b) {
				for (var c in a) this.target[c] = this._oldProps[c] = a[c];
				for (var c in b) this._newProps[c] = b[c], this._deltaProps[c] = b[c] - this.target[c]
			}, a.prototype._init = function() {
				this._startTime = Date.now() + this.delay, this._pausedTime = 0, this.interval > 0 && (this._frameTotal = Math.round(this.time / this.interval)), a.add(this)
			}, a.prototype.start = function() {
				this._init(), this.paused = !1
			}, a.prototype.stop = function() {
				a.remove(this)
			}, a.prototype.pause = function() {
				this.paused = !0, this._pausedStartTime = Date.now()
			}, a.prototype.resume = function() {
				this.paused = !1, this._pausedTime += Date.now() - this._pausedStartTime
			}, a.prototype._update = function() {
				if (!this.paused) {
					var b = Date.now(),
						c = b - this._startTime - this._pausedTime;
					if (!(0 > c)) {
						0 == this._lastTime && null != this.onStart && this.onStart(this), this._lastTime = b;
						var d = this._frameTotal > 0 ? ++this._frameCount / this._frameTotal : c / this.time;
						d > 1 && (d = 1);
						var e = this.ease(d);
						for (var f in this._oldProps) this.target[f] = this._oldProps[f] + this._deltaProps[f] * this._reverseFlag * e;
						if (null != this.onUpdate && this.onUpdate(this, e), d >= 1) {
							if (this.reverse) {
								var g = this._oldProps;
								this._oldProps = this._newProps, this._newProps = g, this._startTime = Date.now(), this._frameCount = 0, this._reverseFlag *= -1, this.loop || (this.reverse = !1)
							} else if (this.loop) {
								for (var f in this._oldProps) this.target[f] = this._oldProps[f];
								this._startTime = Date.now(), this._frameCount = 0
							} else {
								a.remove(this);
								var h, i = this.next;
								null != i && (i instanceof a ? (h = i, i = null) : h = i.shift(), null != h && (h.next = i, h.start()))
							}
							null != this.onComplete && this.onComplete(this)
						}
					}
				}
			}, a._tweens = [], a.step = function() {
				for (var a = this._tweens, b = a.length; --b >= 0;) a[b]._update()
			}, a.add = function(a) {
				return -1 == this._tweens.indexOf(a) && this._tweens.push(a), this
			}, a.remove = function(a) {
				var b = this._tweens,
					c = b.indexOf(a);
				return c > -1 && b.splice(c, 1), this
			}, a.to = function(b, c, d) {
				var e = new a(b, c, d);
				return e._init(), e
			}, a.from = function(b, c, d) {
				var e = new a(b, c, d),
					f = e._oldProps;
				e._oldProps = e._newProps, e._newProps = f, e._reverseFlag = -1;
				for (var g in e._oldProps) b[g] = e._oldProps[g];
				return e._init(), e
			};
			var b = Quark.Easing = {
				Linear: {},
				Quadratic: {},
				Cubic: {},
				Quartic: {},
				Quintic: {},
				Sinusoidal: {},
				Exponential: {},
				Circular: {},
				Elastic: {},
				Back: {},
				Bounce: {}
			};
			b.Linear.EaseNone = function(a) {
				return a
			}, b.Quadratic.EaseIn = function(a) {
				return a * a
			}, b.Quadratic.EaseOut = function(a) {
				return -a * (a - 2)
			}, b.Quadratic.EaseInOut = function(a) {
				return (a *= 2) < 1 ? .5 * a * a : -.5 * (--a * (a - 2) - 1)
			}, b.Cubic.EaseIn = function(a) {
				return a * a * a
			}, b.Cubic.EaseOut = function(a) {
				return --a * a * a + 1
			}, b.Cubic.EaseInOut = function(a) {
				return (a *= 2) < 1 ? .5 * a * a * a : .5 * ((a -= 2) * a * a + 2)
			}, b.Quartic.EaseIn = function(a) {
				return a * a * a * a
			}, b.Quartic.EaseOut = function(a) {
				return -(--a * a * a * a - 1)
			}, b.Quartic.EaseInOut = function(a) {
				return (a *= 2) < 1 ? .5 * a * a * a * a : -.5 * ((a -= 2) * a * a * a - 2)
			}, b.Quintic.EaseIn = function(a) {
				return a * a * a * a * a
			}, b.Quintic.EaseOut = function(a) {
				return (a -= 1) * a * a * a * a + 1
			}, b.Quintic.EaseInOut = function(a) {
				return (a *= 2) < 1 ? .5 * a * a * a * a * a : .5 * ((a -= 2) * a * a * a * a + 2)
			}, b.Sinusoidal.EaseIn = function(a) {
				return -Math.cos(a * Math.PI / 2) + 1
			}, b.Sinusoidal.EaseOut = function(a) {
				return Math.sin(a * Math.PI / 2)
			}, b.Sinusoidal.EaseInOut = function(a) {
				return -.5 * (Math.cos(Math.PI * a) - 1)
			}, b.Exponential.EaseIn = function(a) {
				return 0 == a ? 0 : Math.pow(2, 10 * (a - 1))
			}, b.Exponential.EaseOut = function(a) {
				return 1 == a ? 1 : -Math.pow(2, -10 * a) + 1
			}, b.Exponential.EaseInOut = function(a) {
				return 0 == a ? 0 : 1 == a ? 1 : (a *= 2) < 1 ? .5 * Math.pow(2, 10 * (a - 1)) : .5 * (-Math.pow(2, -10 * (a - 1)) + 2)
			}, b.Circular.EaseIn = function(a) {
				return -(Math.sqrt(1 - a * a) - 1)
			}, b.Circular.EaseOut = function(a) {
				return Math.sqrt(1 - --a * a)
			}, b.Circular.EaseInOut = function(a) {
				return (a /= .5) < 1 ? -.5 * (Math.sqrt(1 - a * a) - 1) : .5 * (Math.sqrt(1 - (a -= 2) * a) + 1)
			}, b.Elastic.EaseIn = function(a) {
				var b, c = .1,
					d = .4;
				return 0 == a ? 0 : 1 == a ? 1 : (d || (d = .3), !c || 1 > c ? (c = 1, b = d / 4) : b = d / (2 * Math.PI) * Math.asin(1 / c), -(c * Math.pow(2, 10 * (a -= 1)) * Math.sin(2 * (a - b) * Math.PI / d)))
			}, b.Elastic.EaseOut = function(a) {
				var b, c = .1,
					d = .4;
				return 0 == a ? 0 : 1 == a ? 1 : (d || (d = .3), !c || 1 > c ? (c = 1, b = d / 4) : b = d / (2 * Math.PI) * Math.asin(1 / c), c * Math.pow(2, -10 * a) * Math.sin(2 * (a - b) * Math.PI / d) + 1)
			}, b.Elastic.EaseInOut = function(a) {
				var b, c = .1,
					d = .4;
				return 0 == a ? 0 : 1 == a ? 1 : (d || (d = .3), !c || 1 > c ? (c = 1, b = d / 4) : b = d / (2 * Math.PI) * Math.asin(1 / c), (a *= 2) < 1 ? -.5 * c * Math.pow(2, 10 * (a -= 1)) * Math.sin(2 * (a - b) * Math.PI / d) : c * Math.pow(2, -10 * (a -= 1)) * Math.sin(2 * (a - b) * Math.PI / d) * .5 + 1)
			}, b.Back.EaseIn = function(a) {
				var b = 1.70158;
				return a * a * ((b + 1) * a - b)
			}, b.Back.EaseOut = function(a) {
				var b = 1.70158;
				return (a -= 1) * a * ((b + 1) * a + b) + 1
			}, b.Back.EaseInOut = function(a) {
				var b = 2.5949095;
				return (a *= 2) < 1 ? .5 * a * a * ((b + 1) * a - b) : .5 * ((a -= 2) * a * ((b + 1) * a + b) + 2)
			}, b.Bounce.EaseIn = function(a) {
				return 1 - b.Bounce.EaseOut(1 - a)
			}, b.Bounce.EaseOut = function(a) {
				return (a /= 1) < 1 / 2.75 ? 7.5625 * a * a : 2 / 2.75 > a ? 7.5625 * (a -= 1.5 / 2.75) * a + .75 : 2.5 / 2.75 > a ? 7.5625 * (a -= 2.25 / 2.75) * a + .9375 : 7.5625 * (a -= 2.625 / 2.75) * a + .984375
			}, b.Bounce.EaseInOut = function(a) {
				return .5 > a ? .5 * b.Bounce.EaseIn(2 * a) : .5 * b.Bounce.EaseOut(2 * a - 1) + .5
			}
		}(), function() {
			var a = Quark.Audio = function(b, c, d, e) {
					a.superClass.constructor.call(this), this.src = b, this.autoPlay = c && d, this.loop = e, this._loaded = !1, this._playing = !1, this._evtHandler = Quark.delegate(this._evtHandler, this), this._element = document.createElement("audio"), this._element.preload = c, this._element.src = b, c && this.load()
				};
			Quark.inherit(a, Quark.EventDispatcher), a.prototype.load = function() {
				this._element.addEventListener("progress", this._evtHandler, !1), this._element.addEventListener("ended", this._evtHandler, !1), this._element.addEventListener("error", this._evtHandler, !1);
				try {
					this._element.load()
				} catch (a) {
					trace(a)
				}
			}, a.prototype._evtHandler = function(a) {
				if ("progress" == a.type) {

					var b = 0,
						c = 0,
						d = a.target.buffered;
					if (d && d.length > 0) for (b = d.length - 1; b >= 0; b--) c = d.end(b) - d.start(b);
					var e = c / a.target.duration;
					e >= 1 && (this._element.removeEventListener("progress", this._evtHandler), this._element.removeEventListener("error", this._evtHandler), this._loaded = !0, this.dispatchEvent({
						type: "loaded",
						target: this
					}), this.autoPlay && this.play())
				} else "ended" == a.type ? (this.dispatchEvent({
					type: "ended",
					target: this
				}), this.loop ? this.play() : this._playing = !1) : "error" == a.type && trace("Quark.Audio Error: " + a.target.src)
			}, a.prototype.play = function() {
				this._loaded ? (this._element.play(), this._playing = !0) : (this.autoPlay = !0, this.load())
			}, a.prototype.stop = function() {
				this._playing && (this._element.pause(), this._playing = !1)
			}, a.prototype.loaded = function() {
				return this._loaded
			}, a.prototype.playing = function() {
				return this._playing
			}
		}(), function() {
			function a(a) {
				return null == a ? !1 : a instanceof HTMLImageElement || a instanceof HTMLCanvasElement || a instanceof HTMLVideoElement
			}
			var b = Quark.Drawable = function(a, b) {
					this.rawDrawable = null, this.domDrawable = null, this.set(a, b)
				};
			b.prototype.get = function(a, b) {
				return null == b || null != b.canvas.getContext ? this.rawDrawable : (null == this.domDrawable && (this.domDrawable = Quark.createDOMDrawable(a, {
					image: this.rawDrawable
				})), this.domDrawable)
			}, b.prototype.set = function(b, c) {
				a(b) && (this.rawDrawable = b), c === !0 ? this.domDrawable = b : this.domDrawable && (this.domDrawable.style.backgroundImage = "url(" + this.rawDrawable.src + ")")
			}
		}(), function() {
			var a = Quark.DisplayObject = function(b) {
					this.id = Quark.UIDUtil.createUID("DisplayObject"), this.name = null, this.x = 0, this.y = 0, this.regX = 0, this.regY = 0, this.width = 0, this.height = 0, this.alpha = 1, this.scaleX = 1, this.scaleY = 1, this.rotation = 0, this.visible = !0, this.eventEnabled = !0, this.transformEnabled = !0, this.useHandCursor = !1, this.polyArea = null, this.mask = null, this.drawable = null, this.parent = null, this.context = null, this._depth = 0, this._lastState = {}, this._stateList = ["x", "y", "regX", "regY", "width", "height", "alpha", "scaleX", "scaleY", "rotation", "visible", "_depth"], Quark.merge(this, b, !0), b.mixin && Quark.merge(this, b.mixin, !1), a.superClass.constructor.call(this, b)
				};
			Quark.inherit(a, Quark.EventDispatcher), a.prototype.setDrawable = function(a) {
				null == this.drawable ? this.drawable = new Quark.Drawable(a) : this.drawable.rawDrawable != a && this.drawable.set(a)
			}, a.prototype.getDrawable = function(a) {
				return this._cache || this.drawable && this.drawable.get(this, a)
			}, a.prototype._update = function(a) {
				this.update(a)
			}, a.prototype.update = function() {
				return !0
			}, a.prototype._render = function(a) {
				var b = this.context || a;
				return !this.visible || this.alpha <= 0 ? (null != b.hide && b.hide(this), void this.saveState(["visible", "alpha"])) : (b.startDraw(), b.transform(this), this.render(b), b.endDraw(), void this.saveState())
			}, a.prototype.render = function(a) {
				a.draw(this, 0, 0, this.width, this.height, 0, 0, this.width, this.height)
			}, a.prototype.saveState = function(a) {
				a = a || this._stateList;
				for (var b = this._lastState, c = 0, d = a.length; d > c; c++) {
					var e = a[c];
					b["last" + e] = this[e]
				}
			}, a.prototype.getState = function(a) {
				return this._lastState["last" + a]
			}, a.prototype.propChanged = function() {
				for (var a = arguments.length > 0 ? arguments : this._stateList, b = 0, c = a.length; c > b; b++) {
					var d = a[b];
					if (this._lastState["last" + d] != this[d]) return !0
				}
				return !1
			}, a.prototype.hitTestPoint = function(a, b, c) {
				return Quark.hitTestPoint(this, a, b, c)
			}, a.prototype.hitTestObject = function(a, b) {
				return Quark.hitTestObject(this, a, b)
			}, a.prototype.localToGlobal = function(a, b) {
				var c = this.getConcatenatedMatrix();
				return {
					x: c.tx + a,
					y: c.ty + b
				}
			}, a.prototype.globalToLocal = function(a, b) {
				var c = this.getConcatenatedMatrix().invert();
				return {
					x: c.tx + a,
					y: c.ty + b
				}
			}, a.prototype.localToTarget = function(a, b, c) {
				var d = this.localToGlobal(a, b);
				return c.globalToLocal(d.x, d.y)
			}, a.prototype.getConcatenatedMatrix = function(a) {
				var b = new Quark.Matrix(1, 0, 0, 1, 0, 0);
				if (a == this) return b;
				for (var c = this; null != c.parent && c.parent != a; c = c.parent) {
					var d = 1,
						e = 0;
					if (c.rotation % 360 != 0) {
						var f = c.rotation * Quark.DEG_TO_RAD;
						d = Math.cos(f), e = Math.sin(f)
					}
					0 != c.regX && (b.tx -= c.regX), 0 != c.regY && (b.ty -= c.regY), b.concat(new Quark.Matrix(d * c.scaleX, e * c.scaleX, -e * c.scaleY, d * c.scaleY, c.x, c.y))
				}
				return b
			}, a.prototype.getBounds = function() {
				var a, b, c, d, e, f = this.width,
					g = this.height,
					h = this.getConcatenatedMatrix(),
					i = this.polyArea || [{
						x: 0,
						y: 0
					}, {
						x: f,
						y: 0
					}, {
						x: f,
						y: g
					}, {
						x: 0,
						y: g
					}],
					j = [],
					k = i.length;
				a = h.transformPoint(i[0], !0, !0), b = c = a.x, d = e = a.y, j[0] = a;
				for (var l = 1; k > l; l++) {
					var a = h.transformPoint(i[l], !0, !0);
					b > a.x ? b = a.x : c < a.x && (c = a.x), d > a.y ? d = a.y : e < a.y && (e = a.y), j[l] = a
				}
				return j.x = b, j.y = d, j.width = c - b, j.height = e - d, j
			}, a.prototype.getCurrentWidth = function() {
				return Math.abs(this.width * this.scaleX)
			}, a.prototype.getCurrentHeight = function() {
				return Math.abs(this.height * this.scaleY)
			}, a.prototype.getStage = function() {
				for (var a = this; a.parent;) a = a.parent;
				return a instanceof Quark.Stage ? a : null
			}, Quark.DisplayObject.prototype.cache = function(a, b) {
				return this._cache = Quark.cacheObject(this, a, b)
			}, Quark.DisplayObject.prototype.uncache = function() {
				this._cache = null
			}, Quark.DisplayObject.prototype.toImage = function(a) {
				return Quark.cacheObject(this, !0, a)
			}, a.prototype.toString = function() {
				return Quark.UIDUtil.displayObjectToString(this)
			}
		}(), function() {
			var a = Quark.DisplayObjectContainer = function(b) {
					if (this.eventChildren = !0, this.autoSize = !1, this.children = [], b = b || {}, a.superClass.constructor.call(this, b), this.id = b.id || Quark.UIDUtil.createUID("DisplayObjectContainer"), this.setDrawable(b.drawable || b.image || null), b.children) for (var c = 0; c < b.children.length; c++) this.addChild(b.children[c])
				};
			Quark.inherit(a, Quark.DisplayObject), a.prototype.addChildAt = function(a, b) {
				0 > b ? b = 0 : b > this.children.length && (b = this.children.length);
				var c = this.getChildIndex(a);
				if (-1 != c) {
					if (c == b) return this;
					this.children.splice(c, 1)
				} else a.parent && a.parent.removeChild(a);
				if (this.children.splice(b, 0, a), a.parent = this, this.autoSize) {
					var d = new Quark.Rectangle(0, 0, this.rectWidth || this.width, this.rectHeight || this.height),
						e = new Quark.Rectangle(a.x, a.y, a.rectWidth || a.width, a.rectHeight || a.height);
					d.union(e), this.width = d.width, this.height = d.height
				}
				return this
			}, a.prototype.addChild = function(a) {
				for (var b = this.children.length, c = 0; c < arguments.length; c++) {
					var a = arguments[c];
					this.addChildAt(a, b + c)
				}
				return this
			}, a.prototype.removeChildAt = function(a) {
				if (0 > a || a >= this.children.length) return !1;
				var b = this.children[a];
				if (null != b) {
					var c = this.getStage();
					null != c && c.context.remove(b), b.parent = null
				}
				return this.children.splice(a, 1), !0
			}, a.prototype.removeChild = function(a) {
				return this.removeChildAt(this.children.indexOf(a))
			}, a.prototype.removeAllChildren = function() {
				for (; this.children.length > 0;) this.removeChildAt(0)
			}, a.prototype.getChildAt = function(a) {
				return 0 > a || a >= this.children.length ? null : this.children[a]
			}, a.prototype.getChildIndex = function(a) {
				return this.children.indexOf(a)
			}, a.prototype.setChildIndex = function(a, b) {
				if (a.parent == this) {
					var c = this.children.indexOf(a);
					b != c && (this.children.splice(c, 1), this.children.splice(b, 0, a))
				}
			}, a.prototype.swapChildren = function(a, b) {
				var c = this.getChildIndex(a),
					d = this.getChildIndex(b);
				this.children[c] = b, this.children[d] = a
			}, a.prototype.swapChildrenAt = function(a, b) {
				var c = this.getChildAt(a),
					d = this.getChildAt(b);
				this.children[a] = d, this.children[b] = c
			}, a.prototype.getChildById = function(a) {
				for (var b = 0, c = this.children.length; c > b; b++) {
					var d = this.children[b];
					if (d.id == a) return d
				}
				return null
			}, a.prototype.removeChildById = function(a) {
				for (var b = 0, c = this.children.length; c > b; b++) if (this.children[b].id == a) return this.removeChildAt(b);
				return null
			}, a.prototype.sortChildren = function(a) {
				var b = a;
				if ("string" == typeof b) {
					var c = b;
					b = function(a, b) {
						return b[c] - a[c]
					}
				}
				this.children.sort(b)
			}, a.prototype.contains = function(a) {
				return -1 != this.getChildIndex(a)
			}, a.prototype.getNumChildren = function() {
				return this.children.length
			}, a.prototype._update = function(a) {
				var b = !0;
				if (null != this.update && (b = this.update(a)), b !== !1) for (var c = this.children.slice(0), d = 0, e = c.length; e > d; d++) {
					var f = c[d];
					f._depth = d + 1, f._update(a)
				}
			}, a.prototype.render = function(b) {
				a.superClass.render.call(this, b);
				for (var c = 0, d = this.children.length; d > c; c++) {
					var e = this.children[c];
					e._render(b)
				}
			}, a.prototype.getObjectUnderPoint = function(a, b, c, d) {
				if (d) var e = [];
				for (var f = this.children.length - 1; f >= 0; f--) {
					var g = this.children[f];
					if (!(null == g || !g.eventEnabled && void 0 == g.children || !g.visible || g.alpha <= 0)) if (void 0 != g.children && g.eventChildren && g.getNumChildren() > 0) {
						var h = g.getObjectUnderPoint(a, b, c, d);
						if (h) {
							if (!d) return h;
							h.length > 0 && (e = e.concat(h))
						} else if (g.hitTestPoint(a, b, c) >= 0) {
							if (!d) return g;
							e.push(g)
						}
					} else if (g.hitTestPoint(a, b, c) >= 0) {
						if (!d) return g;
						e.push(g)
					}
				}
				return d ? e : null
			}
		}(), function() {
			var a = Quark.Stage = function(b) {
					if (this.stageX = 0, this.stageY = 0, this.paused = !1, this._eventTarget = null, b = b || {}, a.superClass.constructor.call(this, b), this.id = b.id || Quark.UIDUtil.createUID("Stage"), null == this.context) throw "Quark.Stage Error: context is required.";
					this.updatePosition()
				};
			Quark.inherit(a, Quark.DisplayObjectContainer), a.prototype.step = function(a) {
				this.paused || (this._update(a), this._render(this.context))
			}, a.prototype._update = function(a) {
				for (var b = this.children.slice(0), c = 0, d = b.length; d > c; c++) {
					var e = b[c];
					e._depth = c + 1, e._update(a)
				}
				null != this.update && this.update(a)
			}, a.prototype._render = function(b) {
				null != b.clear && b.clear(0, 0, this.width, this.height), a.superClass._render.call(this, b)
			}, a.prototype.dispatchEvent = function(b) {
				var c = b.pageX || b.clientX,
					d = b.pageY || b.clientY;
				c = (c - this.stageX) / this.scaleX, d = (d - this.stageY) / this.scaleY;
				var e = this.getObjectUnderPoint(c, d, !0),
					f = this._eventTarget;
				b.eventX = c, b.eventY = d;
				var g = "mouseout" == b.type && !this.context.canvas.contains(b.relatedTarget);
				if (null != f && (f != e || g)) {
					b.lastEventTarget = f;
					var h = g || null == e || "mousemove" == b.type ? "mouseout" : "touchmove" == b.type ? "touchout" : null;
					h && f.dispatchEvent({
						type: h
					}), this._eventTarget = null
				}
				if (null != e && e.eventEnabled && "mouseout" != b.type && (b.eventTarget = f = this._eventTarget = e, e.dispatchEvent(b)), !Quark.supportTouch) {
					var i = f && f.useHandCursor && f.eventEnabled ? "pointer" : "";
					this.context.canvas.style.cursor = i
				}(g || "mouseout" != b.type) && a.superClass.dispatchEvent.call(this, b)
			}, a.prototype.updatePosition = function() {
				var a = Quark.getElementOffset(this.context.canvas);
				this.stageX = a.left, this.stageY = a.top
			}
		}(), function() {
			var a = Quark.Bitmap = function(b) {
					this.image = null, this.rectX = 0, this.rectY = 0, this.rectWidth = 0, this.rectHeight = 0, b = b || {}, a.superClass.constructor.call(this, b), this.id = b.id || Quark.UIDUtil.createUID("Bitmap"), this.setRect(b.rect || [0, 0, this.image.width, this.image.height]), this.setDrawable(this.image), this._stateList.push("rectX", "rectY", "rectWidth", "rectHeight")
				};
			Quark.inherit(a, Quark.DisplayObject), a.prototype.setRect = function(a) {
				this.rectX = a[0], this.rectY = a[1], this.rectWidth = this.width = a[2], this.rectHeight = this.height = a[3]
			}, a.prototype.render = function(a) {
				a.draw(this, this.rectX, this.rectY, this.rectWidth, this.rectHeight, 0, 0, this.width, this.height)
			}
		}(), function() {
			var a = Quark.MovieClip = function(b) {
					this.interval = 0, this.paused = !1, this.useFrames = !1, this.currentFrame = 0, this._frames = [], this._frameLabels = {}, this._frameDisObj = null, this._displayedCount = 0, b = b || {}, a.superClass.constructor.call(this, b), this.id = b.id || Quark.UIDUtil.createUID("MovieClip"), b.frames && this.addFrame(b.frames)
				};
			Quark.inherit(a, Quark.Bitmap), a.prototype.addFrame = function(a) {
				var b = this._frames.length;
				if (a instanceof Array) for (var c = 0; c < a.length; c++) this.setFrame(a[c], b + c);
				else this.setFrame(a, b);
				return this
			}, a.prototype.setFrame = function(a, b) {
				void 0 == b || b > this._frames.length ? b = this._frames.length : 0 > b && (b = 0), this._frames[b] = a, a.label && (this._frameLabels[a.label] = a), void 0 == a.interval && (a.interval = this.interval), 0 == b && 0 == this.currentFrame && this.setRect(a.rect)
			}, a.prototype.getFrame = function(a) {
				return "number" == typeof a ? this._frames[a] : this._frameLabels[a]
			}, a.prototype.play = function() {
				this.paused = !1
			}, a.prototype.stop = function() {
				this.paused = !0
			}, a.prototype.gotoAndStop = function(a) {
				this.currentFrame = this.getFrameIndex(a), this.paused = !0
			}, a.prototype.gotoAndPlay = function(a) {
				this.currentFrame = this.getFrameIndex(a), this.paused = !1
			}, a.prototype.getFrameIndex = function(a) {
				if ("number" == typeof a) return a;
				for (var b = this._frameLabels[a], c = this._frames, d = 0; d < c.length; d++) if (b == c[d]) return d;
				return -1
			}, a.prototype.nextFrame = function(a) {
				var b = this._frames[this.currentFrame];
				if (b.interval > 0) {
					var c = this._displayedCount + a;
					this._displayedCount = b.interval > c ? c : 0
				}
				return !(b.jump >= 0 || "string" == typeof b.jump) || 0 != this._displayedCount && b.interval ? b.interval > 0 && this._displayedCount > 0 ? this.currentFrame : this.currentFrame >= this._frames.length - 1 ? this.currentFrame = 0 : ++this.currentFrame : this.currentFrame = this.getFrameIndex(b.jump)
			}, a.prototype.getNumFrames = function() {
				return this._frames.length
			}, a.prototype._update = function(b) {
				var c = this._frames[this.currentFrame];
				if (c.stop) return void this.stop();
				if (!this.paused) {
					var d = this.useFrames ? 1 : b && b.deltaTime;
					c = this._frames[this.nextFrame(d)]
				}
				this.setRect(c.rect), a.superClass._update.call(this, b)
			}, a.prototype.render = function(a) {
				var b = this._frames[this.currentFrame],
					c = b.rect;
				a.draw(this, c[0], c[1], c[2], c[3], 0, 0, this.width, this.height)
			}
		}(), function() {
			var a = Quark.Button = function(b) {
					this.state = a.UP, this.enabled = !0, b = b || {}, a.superClass.constructor.call(this, b), this.id = b.id || Quark.UIDUtil.createUID("Button"), this._skin = new Quark.MovieClip({
						id: "skin",
						image: b.image
					}), this.addChild(this._skin), this._skin.stop(), this.eventChildren = !1, void 0 === b.useHandCursor && (this.useHandCursor = !0), b.up && this.setUpState(b.up), b.over && this.setOverState(b.over), b.down && this.setDownState(b.down), b.disabled && this.setDisabledState(b.disabled)
				};
			Quark.inherit(a, Quark.DisplayObjectContainer), a.UP = "up", a.OVER = "over", a.DOWN = "down", a.DISABLED = "disabled", a.prototype.setUpState = function(b) {
				return b.label = a.UP, this._skin.setFrame(b, 0), this.upState = b, this
			}, a.prototype.setOverState = function(b) {
				return b.label = a.OVER, this._skin.setFrame(b, 1), this.overState = b, this
			}, a.prototype.setDownState = function(b) {
				return b.label = a.DOWN, this._skin.setFrame(b, 2), this.downState = b, this
			}, a.prototype.setDisabledState = function(b) {
				return b.label = a.DISABLED, this._skin.setFrame(b, 3), this.disabledState = b, this
			}, a.prototype.setEnabled = function(b) {
				return this.enabled == b ? this : (this.eventEnabled = this.enabled = b, b ? 3 == this._skin.currentFrame && this._skin.gotoAndStop(a.UP) : this._skin.gotoAndStop(this.disabledState ? a.DISABLED : a.UP), this)
			}, a.prototype.changeState = function(b) {
				if (this.state != b) {
					switch (this.state = b, b) {
					case a.OVER:
					case a.DOWN:
					case a.UP:
						this.enabled || (this.eventEnabled = this.enabled = !0), this._skin.gotoAndStop(b);
						break;
					case a.DISABLED:
						this.setEnabled(!1)
					}
					return this
				}
			}, a.prototype.dispatchEvent = function(b) {
				if (this.enabled) {
					switch (b.type) {
					case "mousemove":
						this.overState && this.changeState(a.OVER);
						break;
					case "mousedown":
					case "touchstart":
					case "touchmove":
						this.downState && this.changeState(a.DOWN);
						break;
					case "mouseup":
						this.changeState(this.overState ? a.OVER : a.UP);
						break;
					case "mouseout":
					case "touchout":
					case "touchend":
						this.upState && this.changeState(a.UP)
					}
					a.superClass.dispatchEvent.call(this, b)
				}
			}, a.prototype.setDrawable = function() {
				a.superClass.setDrawable.call(this, null)
			}
		}(), function() {
			var a = Quark.Graphics = function(b) {
					this.lineWidth = 1, this.strokeStyle = "0", this.lineAlpha = 1, this.lineCap = null, this.lineJoin = null, this.miterLimit = 10, this.hasStroke = !1, this.hasFill = !1, this.fillStyle = "0", this.fillAlpha = 1, b = b || {}, a.superClass.constructor.call(this, b), this.id = Quark.UIDUtil.createUID("Graphics"), this._actions = [], this._cache = null
				};
			Quark.inherit(a, Quark.DisplayObject), a.prototype.lineStyle = function(a, b, c, d, e, f) {
				return this._addAction(["lineWidth", this.lineWidth = a || 1]), this._addAction(["strokeStyle", this.strokeStyle = b || "0"]), this._addAction(["lineAlpha", this.lineAlpha = c || 1]), void 0 != d && this._addAction(["lineCap", this.lineCap = d]), void 0 != e && this._addAction(["lineJoin", this.lineJoin = e]), void 0 != f && this._addAction(["miterLimit", this.miterLimit = f]), this.hasStroke = !0, this
			}, a.prototype.beginFill = function(a, b) {
				return this._addAction(["fillStyle", this.fillStyle = a]), this._addAction(["fillAlpha", this.fillAlpha = b || 1]), this.hasFill = !0, this
			}, a.prototype.endFill = function() {
				return this.hasStroke && this._addAction(["stroke"]), this.hasFill && this._addAction(["fill"]), this
			}, a.prototype.beginLinearGradientFill = function(b, c, d, e, f, g) {
				for (var h = a._getContext().createLinearGradient(b, c, d, e), i = 0, j = f.length; j > i; i++) h.addColorStop(g[i], f[i]);
				return this._addAction(["fillStyle", this.fillStyle = h])
			}, a.prototype.beginRadialGradientFill = function(b, c, d, e, f, g, h, i) {
				for (var j = a._getContext().createRadialGradient(b, c, d, e, f, g), k = 0, l = h.length; l > k; k++) j.addColorStop(i[k], h[k]);
				return this._addAction(["fillStyle", this.fillStyle = j])
			}, a.prototype.beginBitmapFill = function(b, c) {
				var d = a._getContext().createPattern(b, c || "");
				return this._addAction(["fillStyle", this.fillStyle = d])
			}, a.prototype.beginPath = function() {
				return this._addAction(["beginPath"])
			}, a.prototype.closePath = function() {
				return this._addAction(["closePath"])
			}, a.prototype.drawRect = function(a, b, c, d) {
				return this._addAction(["rect", a, b, c, d])
			}, a.prototype.drawRoundRectComplex = function(a, b, c, d, e, f, g, h) {
				return this._addAction(["moveTo", a + e, b]), this._addAction(["lineTo", a + c - f, b]), this._addAction(["arc", a + c - f, b + f, f, -Math.PI / 2, 0, !1]), this._addAction(["lineTo", a + c, b + d - g]), this._addAction(["arc", a + c - g, b + d - g, g, 0, Math.PI / 2, !1]), this._addAction(["lineTo", a + h, b + d]), this._addAction(["arc", a + h, b + d - h, h, Math.PI / 2, Math.PI, !1]), this._addAction(["lineTo", a, b + e]), this._addAction(["arc", a + e, b + e, e, Math.PI, 3 * Math.PI / 2, !1]), this
			}, a.prototype.drawRoundRect = function(a, b, c, d, e) {
				return this.drawRoundRectComplex(a, b, c, d, e, e, e, e)
			}, a.prototype.drawCircle = function(a, b, c) {
				return this._addAction(["arc", a + c, b + c, c, 0, 2 * Math.PI, 0])
			}, a.prototype.drawEllipse = function(a, b, c, d) {
				if (c == d) return this.drawCircle(a, b, c);
				var e = c / 2,
					f = d / 2,
					g = .5522847498307933,
					h = g * e,
					i = g * f;
				return a += e, b += f, this._addAction(["moveTo", a + e, b]), this._addAction(["bezierCurveTo", a + e, b - i, a + h, b - f, a, b - f]), this._addAction(["bezierCurveTo", a - h, b - f, a - e, b - i, a - e, b]), this._addAction(["bezierCurveTo", a - e, b + i, a - h, b + f, a, b + f]), this._addAction(["bezierCurveTo", a + h, b + f, a + e, b + i, a + e, b]), this
			}, a.prototype.drawSVGPath = function(a) {
				var b = a.split(/,| (?=[a-zA-Z])/);
				this._addAction(["beginPath"]);
				for (var c = 0, d = b.length; d > c; c++) {
					var e = b[c],
						f = e[0].toUpperCase(),
						g = e.substring(1).split(/,| /);
					switch (0 == g[0].length && g.shift(), f) {
					case "M":
						this._addAction(["moveTo", g[0], g[1]]);
						break;
					case "L":
						this._addAction(["lineTo", g[0], g[1]]);
						break;
					case "C":
						this._addAction(["bezierCurveTo", g[0], g[1], g[2], g[3], g[4], g[5]]);
						break;
					case "Z":
						this._addAction(["closePath"])
					}
				}
				return this
			}, a.prototype._draw = function(a) {
				a.beginPath();
				for (var b = 0, c = this._actions.length; c > b; b++) {
					var d = this._actions[b],
						e = d[0],
						f = d.length > 1 ? d.slice(1) : null;
					"function" == typeof a[e] ? a[e].apply(a, f) : a[e] = d[1]
				}
			}, a.prototype.getDrawable = function(a) {
				return null == this.drawable && this.setDrawable(this.toImage()), this.drawable.get(this, a)
			}, a.prototype.cache = function(a) {
				var b = Quark.createDOM("canvas", {
					width: this.width,
					height: this.height
				});
				return this._draw(b.getContext("2d")), this._cache = b, a && (this._cache = this.toImage()), this._cache
			}, a.prototype.uncache = function() {
				this._cache = null
			}, a.prototype.toImage = function(a) {
				var b = this._cache || this.cache(!0);
				if (b instanceof HTMLImageElement) return b;
				var c = new Image;
				return c.src = b.toDataURL(a || "image/png"), c.width = this.width, c.height = this.height, c
			}, a.prototype.clear = function() {
				this._actions.length = 0, this._cache = null, this.lineWidth = 1, this.strokeStyle = "0", this.lineAlpha = 1, this.lineCap = null, this.lineJoin = null, this.miterLimit = 10, this.hasStroke = !1, this.fillStyle = "0", this.fillAlpha = 1
			}, a.prototype._addAction = function(a) {
				return this._actions.push(a), this
			}, a._getContext = function() {
				var a = Quark.createDOM("canvas").getContext("2d");
				return this._getContext = function() {
					return a
				}, a
			}
		}(), function() {
			var a = Quark.Text = function(b) {
					this.text = "", this.font = "12px arial", this.color = "#000", this.textAlign = "start", this.outline = !1, this.maxWidth = 1e4, this.lineWidth = null, this.lineSpacing = 0, this.fontMetrics = null, b = b || {}, a.superClass.constructor.call(this, b), this.id = Quark.UIDUtil.createUID("Text"), null == this.fontMetrics && (this.fontMetrics = a.getFontMetrics(this.font))
				};
			Quark.inherit(a, Quark.DisplayObject), a.prototype._draw = function(a) {
				if (this.text && 0 != this.text.length) {
					a.font = this.font, a.textAlign = this.textAlign, a.textBaseline = "top", this.outline ? a.strokeStyle = this.color : a.fillStyle = this.color;
					var b = this.text.split(/\r\n|\r|\n|<br(?:[ \/])*>/),
						c = 0,
						d = this.fontMetrics.height + this.lineSpacing;
					this.width = this.lineWidth || 0;
					for (var e = 0, f = b.length; f > e; e++) {
						var g = b[e],
							h = a.measureText(g).width;
						if (null == this.lineWidth || h < this.lineWidth) h > this.width && (this.width = h), this._drawTextLine(a, g, c), c += d;
						else {
							for (var i = g.split(/([^\x00-\xff]|\b)/), j = i[0], k = 1, l = i.length; l > k; k++) {
								var m = i[k];
								if (m && 0 != m.length) {
									var n = a.measureText(j + m).width;
									n > this.lineWidth ? (this._drawTextLine(a, j, c), c += d, j = m) : j += m
								}
							}
							this._drawTextLine(a, j, c), c += d
						}
					}
					this.height = c
				}
			}, a.prototype._drawTextLine = function(a, b, c) {
				var d = 0;
				switch (this.textAlign) {
				case "center":
					d = .5 * this.width;
					break;
				case "right":
				case "end":
					d = this.width
				}
				this.outline ? a.strokeText(b, d, c, this.maxWidth) : a.fillText(b, d, c, this.maxWidth)
			}, a.prototype.setFont = function(b, c) {
				this.font != b && (this.font = b, c || (this.fontMetrics = a.getFontMetrics(this.font)))
			}, a.prototype.render = function(b) {
				if (b instanceof Quark.DOMContext) {
					var c = this.getDrawable(b),
						d = c.style;
					d.font = this.font, d.textAlign = this.textAlign, d.color = this.color, d.width = this.width + "px", d.height = this.height + "px", d.lineHeight = this.fontMetrics.height + this.lineSpacing + "px", c.innerHTML = this.text
				}
				a.superClass.render.call(this, b)
			}, a.prototype.getDrawable = function(a) {
				return null == this.drawable && this.setDrawable(Quark.createDOM("div"), !0), this.drawable.get(this, a)
			}, a.getFontMetrics = function(a) {
				var b = {},
					c = Quark.createDOM("div", {
						style: {
							font: a,
							position: "absolute"
						},
						innerHTML: "M"
					});
				document.body.appendChild(c), b.height = c.offsetHeight, c.innerHTML = '<div style="display:inline-block; width:1px; height:1px;"></div>';
				var d = c.childNodes[0];
				return b.ascent = d.offsetTop + d.offsetHeight, b.descent = b.height - b.ascent, document.body.removeChild(c), b
			}
		}()
	}(), function() {
		!
		function() {
			if (!window.Motion) {
				var a = {
					version: "1.1",
					add: function(a, b) {
						for (var c = window, d = arguments.callee, e = null, f = (/^([\w\.]+)(?:\:([\w\.]+))?\s*$/.test(a), RegExp.$1.split(".")), g = RegExp.$2.split("."), a = f.pop(), h = /[A-Z]/.test(a.substr(0, 1)), i = function() {
								var a = arguments.callee.prototype.init;
								"function" == typeof a && arguments.callee.caller != d && a && a.apply(this, arguments)
							}, j = 0; j < f.length; j++) {
							var k = f[j];
							c = c[k] || (c[k] = {})
						}
						if ("" != g[0]) {
							e = window;
							for (var j = 0; j < g.length; j++) if (e = e[g[j]], !e) {
								e = null;
								break
							}
						}
						h && "function" == typeof b ? (e && (i.prototype = new e, i.prototype.superClass = e), c[a] = i, i.prototype.constructor = i, b.call(c[a].prototype)) : c[a] = b
					}
				};
				window.Motion = window.mo = a
			}
		}()
	}(), function() {
		Motion.add("mo.Base", function() {
			{
				var a = this;
				this.constructor
			}
			a.constructor = function() {}, a.on = function() {
				return box = Zepto(this), box.on.apply(box, arguments)
			}, a.off = function() {
				return box = Zepto(this), box.off.apply(box, arguments)
			}, a.trigger = function() {
				var a = Zepto(this);
				return a.triggerHandler.apply(a, arguments)
			}
		})
	}(), function() {
		Motion.add("mo.ImageEditor:mo.Base", function() {
			var a = this,
				b = {},
				c = this.constructor;
			c.config = {
				width: 320,
				height: 320,
				fps: 60
			}, a.init = function(a) {
				this.config = Zepto.extend(!0, {}, c.config, a);
				var d = this,
					a = d.config;
				if (d.effect && d.on(d.effect), a.event && d.on(a.event), d.trigger("beforeinit") !== !1) {
					var e = Quark.createDOM("canvas", {
						width: a.width,
						height: a.height,
						style: {
							backgroundColor: "#fff"
						}
					});
					e = $(e).appendTo(a.container)[0];
					var f = new Quark.CanvasContext({
						canvas: e
					});
					d.stage = new Quark.Stage({
						width: a.width,
						height: a.height,
						context: f
					}), d.canvas = e, d.context = f;
					var g = this.em = new Quark.EventManager;
					g.registerStage(d.stage, ["touchstart", "touchmove", "touchend"], !0, !0), d.stage.stageX = a.stageX !== window.undefined ? a.stageX : d.stage.stageX, d.stage.stageY = a.stageY !== window.undefined ? a.stageY : d.stage.stageY;
					var h = new Quark.Timer(1e3 / a.fps);
					h.addListener(d.stage), h.addListener(Quark.Tween), h.start();
					var i = new Q.Graphics({
						width: a.width,
						height: a.height
					});
					i.beginFill("#fff").drawRect(0, 0, a.width, a.height).endFill().cache(), d.stage.addChild(i), b.attach.call(d)
				}
			}, b.attach = function() {
				var a = this,
					b = a.config;
				b.trigger.on("change", function() {
					a.trigger("beforechange");
					var b = this.files[0];
					if (b.type && !/image\/\w+/.test(b.type)) return alert("璇烽€夋嫨鍥剧墖鏂囦欢锛�"), !1;
					var c = new FileReader;
					c.readAsDataURL(b), c.onload = function() {
						var b, c = this.result,
							d = new Image;
						d.onload = function() {
							a.addImage({
								img: d,
								exif: b
							}), a.trigger("change")
						};
						var e = c.replace(/^.*?,/, ""),
							f = atob(e),
							g = new BinaryFile(f);
						b = EXIF.readFromBinaryFile(g), d.src = c
					}
				}), a.stage.addEventListener("touchstart", function(b) {
					if (a.imgs) for (var c = 0; c < a.imgs.length; c++) a.imgs[c].disable();
					b.eventTarget && b.eventTarget.parent.enEditable && (b.eventTarget.parent.enEditable(), a.activeTarget = b.eventTarget.parent)
				}), a.stage.addEventListener("touchmove", function() {}), a.stage.addEventListener("touchend", function() {
					a.activeTarget && a.activeTarget.mcScale && delete a.activeTarget.mcScale.touchDis
				})
			}, a.addImage = function(a) {
				var b, c, d = this,
					e = d.config,
					f = a.img,
					g = a.exif,
					h = f.width,
					i = f.height,
					j = 0,
					k = 0,
					l = 0,
					m = 0,
					n = a.pos ? a.pos[0] : 0,
					o = a.pos ? a.pos[1] : 0,
					p = 1,
					q = g ? g.Orientation : 1,
					r = function(a) {
						if (/png$/i.test(a.src)) return 1;
						var b = (a.naturalWidth, a.naturalHeight),
							c = document.createElement("canvas");
						c.width = 1, c.height = b;
						var d = c.getContext("2d");
						d.drawImage(a, 0, 0);
						for (var e = d.getImageData(0, 0, 1, b).data, f = 0, g = b, h = b; h > f;) {
							var i = e[4 * (h - 1) + 3];
							0 === i ? g = h : f = h, h = g + f >> 1
						}
						var j = h / b;
						return 0 === j ? 1 : j
					},
					s = r(f);
				if ("string" == typeof f) {
					var t = f;
					f = new Image, f.src = t
				}
				switch (q) {
				case 3:
					j = 180, k = h, l = i * s;
					break;
				case 6:
					j = 90, h = f.height, i = f.width, l = h * s;
					break;
				case 8:
					if (j = 270, h = f.height, i = f.width, k = i * s, /iphone|ipod|ipad/i.test(navigator.userAgent)) return void alert("鑻规灉绯荤粺涓嬫殏涓嶆敮鎸佷綘浠ヨ繖涔堣悓锛佽悓锛佽揪锛佸Э鍔挎媿鐓э紒")
				}
				h *= s, i *= s, h > d.stage.width && (p = d.stage.width / h), h *= p, i *= p, b = new Quark.DisplayObjectContainer({
					width: h,
					height: i
				}), b.x = n, b.y = o, f = new Quark.Bitmap({
					image: f,
					regX: k,
					regY: l
				}), f.rotation = j, f.x = m, f.y = 0, f.scaleX = p * s, f.scaleY = p;
				var u = new Q.Graphics({
					width: h + 10,
					height: i + 10,
					x: -5,
					y: -5
				});
				if (u.lineStyle(5, "#aaa").beginFill("#fff").drawRect(5, 5, h, i).endFill().cache(), u.alpha = .5, u.visible = !1, b.addChild(u), e.iconClose) {
					var v = new Image;
					v.onload = function() {
						var a = e.iconClose.rect;
						c = new Quark.MovieClip({
							image: v
						}), c.addFrame([{
							rect: a
						}]), c.x = 0, c.y = 0, c.alpha = .5, c.visible = !1, c.addEventListener("touchstart", function() {
							c.alpha = .8
						}), c.addEventListener("touchend", function() {
							d.stage.removeChild(b)
						}), d.stage.addEventListener("touchend", function() {
							c.alpha = .5
						}), b.addChild(c)
					}, v.src = e.iconClose.url
				}
				return a.disable || (f.fnStart = function(a) {
					var c = a.rawEvent && a.rawEvent.touches[1];
					if (c) {
						var e = a.rawEvent.touches[0],
							g = a.rawEvent.touches[1];
						f.startScaleDistance = Math.sqrt(Math.pow(g.pageX - e.pageX, 2) + Math.pow(g.pageY - e.pageY, 2)), f.touchStart = [{
							x: e.pageX,
							y: e.pageY
						}, {
							x: g.pageX,
							y: g.pageY
						}], f.touchStartScale = [{
							x: e.pageX,
							y: e.pageY
						}, {
							x: g.pageX,
							y: g.pageY
						}], f.imgContainerStartRotation = b.rotation;
						for (var h = f.touchStart, i = {
							x: 0,
							y: 0
						}, j = 0; j < h.length; j++) i.x += h[j].x, i.y += h[j].y;
						i.x /= h.length, i.y /= h.length, i.x -= d.canvas.offsetLeft, i.y -= d.canvas.offsetTop;
						var k = {
							x: 0,
							y: 0
						},
							l = Math.sqrt(Math.pow(b.regX * b.scaleX, 2) + Math.pow(b.regY * b.scaleY, 2)),
							m = Math.atan2(b.regY, b.regX);
						m = 180 / Math.PI * m, k.x = b.x - Math.cos(Math.PI * (b.rotation + m) / 180) * l, k.y = b.y - Math.sin(Math.PI * (b.rotation + m) / 180) * l, i.x -= k.x, i.y -= k.y;
						var l = Math.sqrt(Math.pow(i.x, 2) + Math.pow(i.y, 2)),
							m = Math.atan2(i.y, i.x);
						m = 180 / Math.PI * m;
						var n = l * Math.cos(Math.PI * (m - b.rotation) / 180) / b.scaleX,
							o = l * Math.sin(Math.PI * (m - b.rotation) / 180) / b.scaleY,
							p = n - b.regX,
							q = o - b.regY;
						b.regX += p, b.regY += q;
						var l = Math.sqrt(Math.pow(p, 2) + Math.pow(q, 2)),
							m = Math.atan2(q, p);
						m = 180 / Math.PI * m, b.x += l * Math.cos(Math.PI * (b.rotation + m) / 180) * b.scaleX, b.y += l * Math.sin(Math.PI * (b.rotation + m) / 180) * b.scaleY
					} else f.curW = b.getCurrentWidth(), f.curH = b.getCurrentHeight(), f.moveabled = !0, f.touchStart = [{
						x: a.eventX,
						y: a.eventY
					}], delete f.startScaleDistance
				}, f.fnMove = function(c) {
					var d = [],
						e = f.touchStart.length > 1 ? !0 : !1;
					if (d = e ? [{
						x: c.rawEvent.touches[0].pageX,
						y: c.rawEvent.touches[0].pageY
					}, {
						x: c.rawEvent.touches[1].pageX,
						y: c.rawEvent.touches[1].pageY
					}] : [{
						x: c.eventX,

						y: c.eventY
					}], !a.disScale && e) {
						var g = Math.sqrt(Math.pow(d[1].x - d[0].x, 2) + Math.pow(d[1].y - d[0].y, 2));
						if (f.startScaleDistance) {
							var h = g * b.scaleX / f.startScaleDistance;
							b.scaleX = h, b.scaleY = h
						}
						f.startScaleDistance = g
					}
					if (!a.disMove && f.moveabled) {
						for (var i = 0, j = 0, k = 0; k < d.length; k++) i += d[k].x - f.touchStart[k].x, j += d[k].y - f.touchStart[k].y;
						i /= d.length, j /= d.length, b.x += i, b.y += j, f.touchStart = d
					}
					if (e) {
						var l = f.touchStartScale[1].x - f.touchStartScale[0].x,
							m = f.touchStartScale[1].y - f.touchStartScale[0].y,
							n = Math.atan2(m, l);
						n = 180 / Math.PI * n;
						var l = d[1].x - d[0].x,
							m = d[1].y - d[0].y,
							o = Math.atan2(m, l);
						o = 180 / Math.PI * o, b.rotation = f.imgContainerStartRotation + o - n
					}
				}, f.fnEnd = function(a) {
					f.moveabled = !1;
					var c = a.rawEvent && a.rawEvent.touches[1];
					if (c) {
						var d = a.rawEvent.touches[0],
							e = a.rawEvent.touches[1];
						f.startScaleDistance = Math.sqrt(Math.pow(e.pageX - d.pageX, 2) + Math.pow(e.pageY - d.pageY, 2)), f.touchStart = [{
							x: d.pageX,
							y: d.pageY
						}, {
							x: e.pageX,
							y: e.pageY
						}]
					} else f.curW = b.getCurrentWidth(), f.curH = b.getCurrentHeight(), f.moveabled = !0, f.touchStart = [{
						x: a.eventX,
						y: a.eventY
					}], delete f.startScaleDistance
				}, f.addEventListener("touchstart", function(a) {
					f.fnStart(a)
				}), f.addEventListener("touchmove", function(a) {
					f.fnMove(a)
				}), f.addEventListener("touchend", function(a) {
					f.fnEnd(a)
				})), b.enEditable = function() {
					a.disable || (u.visible = !0, c && (c.visible = !0))
				}, b.disable = function() {
					u.visible = !1, c && (c.visible = !1)
				}, f.update = function() {
					b && b.scaleX && c && c.scaleX && (c.scaleX = 1 / b.scaleX, c.scaleY = 1 / b.scaleY, c.x = 0)
				}, b.addChild(f), d.stage.update = function() {}, b.update = function() {}, d.stage.addChild(b), d.imgs ? d.imgs.push(b) : d.imgs = [b], b
			}, a.clear = function() {
				if (this.imgs) for (var a = 0; a < this.imgs.length; a++) this.stage.removeChild(this.imgs[a])
			}, a.unSelect = function() {
				var a = this.imgs;
				if (a) for (var b = 0; b < a.length; b++) a[b].disable()
			}, a.toDataURL = function(a) {
				var b = this;
				b.unSelect(), window.setTimeout(function() {
					var c = new JPEGEncoder,
						d = c.encode(b.canvas.getContext("2d").getImageData(0, 0, b.stage.width, b.stage.height), 90);
					a.call(b, d)
				}, 1e3 / b.config.fps)
			}
		})
	}()
}(); /*  |xGv00|e857c6b0f543258ab1e2901f8fb1fb6c */