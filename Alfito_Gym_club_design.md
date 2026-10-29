# ALFITO GYM CLUB // DESIGN SYSTEM SPECIFICATION (DESIGN.MD)
VERSION: 2.4.0 // SPEC-REV 4.8.2
THEME: Kinetic Obsidian
TARGET: Production Web & Mobile System Architecture

---

## 1. BRAND IDENTITY & ETHOS

Alfito Gym Club is an elite, high-performance athletic facility and human performance institute combining cutting-edge biometric telemetry, calibrated Olympic weightlifting arenas, clinical sports science, and high-fashion luxury architectural spaces.

### Brand Keywords
- Precision Engineering
- Kinetic Velocity
- Subterranean Monolith
- Biometric Governance
- Tactical Minimalism

---

## 2. COLOR PALETTE & TOKENS

The palette relies on a high-contrast obsidian baseline accented by an electric kinetic volt lime and calibrated status indicators.

| Token Name | Hex Value | RGB / HSL | Usage |
| :--- | :--- | :--- | :--- |
| `surface-canvas` | `#0C0E11` | `rgb(12, 14, 17)` | Root backdrop, deep void background |
| `surface-base` | `#111317` | `rgb(17, 19, 23)` | Primary card and component containers |
| `surface-raised` | `#16191F` | `rgb(22, 25, 31)` | Elevated modules, popovers, active tabs |
| `surface-overlay`| `#1E2229` | `rgb(30, 34, 41)` | Modal wrappers, secondary cards, chips |
| `border-subtle` | `#1C2027` | `rgb(28, 32, 39)` | Default structural dividers & card borders |
| `border-prominent`| `#2A2F3A` | `rgb(42, 47, 58)` | Interactive input borders, table borders |
| `kinetic-lime` | `#C7F36B` | `rgb(199, 243, 107)`| Brand primary, active state, core CTAs, glows |
| `text-primary` | `#F1F3F5` | `rgb(241, 243, 245)`| Main headings, critical readouts, high contrast |
| `text-secondary`| `#A0A5AD` | `rgb(160, 165, 173)`| Body text, descriptions, table labels |
| `text-muted` | `#636773` | `rgb(99, 103, 115)` | Captions, disabled text, secondary metadata |
| `state-pending` | `#F59E0B` | `rgb(245, 158, 11)` | Amber warnings, queues, audit required |
| `state-critical`| `#EF4444` | `rgb(239, 68, 68)` | Crimson lockout, access denial, hardware faults|
| `state-optimal` | `#10B981` | `rgb(16, 185, 129)` | Verified biometrics, nominal telemetry |

---

## 3. TYPOGRAPHY SYSTEM

Typography pairs display power with strict technical data legibility.

| Role | Font Family | Weight / Case | Size | Line Height | Tracking | Purpose |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| **Display Hero** | `Bebas Neue` | Regular / UPPERCASE | `56px – 72px` | `1.0` | `+1.5px` | Hero banner titles, splash titles |
| **Section Header** | `Bebas Neue` | Regular / UPPERCASE | `32px – 40px` | `1.05` | `+1.0px` | Major zone headers, card cluster titles |
| **Component Title**| `Bebas Neue` | Regular / UPPERCASE | `20px – 24px` | `1.1` | `+0.8px` | Metric titles, modal headlines |
| **Monospace Telemetry**| `JetBrains Mono` / Monospace | Bold / UPPERCASE | `11px – 13px` | `1.4` | `+2.0px` | UUIDs, turnstile timestamps, status badges |
| **Body Primary** | `Inter` | Regular / 400 | `14px – 15px` | `1.6` | `0` | Athlete dossiers, paragraph descriptions |
| **Body UI Medium**| `Inter` | Medium / 500 | `13px – 14px` | `1.4` | `+0.2px` | Form field labels, button subtext |
| **Micro Caption** | `Inter` | SemiBold / 600 | `11px – 12px` | `1.3` | `+0.5px` | Table headers, footnote disclaimers |

---

## 4. SPACING, GRID & LAYOUT SCALE

Built on a unified **4px baseline rhythm**.

- `space-1` (4px): Micro padding, badge icon-to-text spacing
- `space-2` (8px): Icon container padding, compact horizontal tags
- `space-3` (12px): Standard form element gap, table cell inner margins
- `space-4` (16px): Card internal padding, list item vertical separation
- `space-6` (24px): Card exterior padding, form stack separation
- `space-8` (32px): Sub-section rhythm, grid column gutters
- `space-12` (48px): Page-level module separation
- `space-16` (64px) / `space-20` (80px): Major structural section dividing whitespace

### Viewport Dimensions
- **Desktop System Standard**: 1440px canvas width (Content container: 1280px max-width, or full-width admin dashboard)
- **Admin Navigation Sidebar**: 260px fixed width, left-anchored
- **Admin Global Top Console**: 64px fixed height
- **Mobile Standard**: 390px viewport width (Responsive touch target min: 48px × 48px)

---

## 5. BRAND ASSETS & ART DIRECTION

### 5.1 Official Brand Monogram & Emblem
- **Asset ID**: `{{DATA:IMAGE:IMAGE_5}}`
- **Monogram Architecture**: Stylized kinetic 'R' glyph slashed with an electric precision volt accent, encapsulated by an angular hexagonal geometry over a rounded dark obsidian (`#0C0E11`) badge.
- **Specifications**:
  - Vertical White Obsidian Spine: 28px width, `#F1F3F5`
  - Kinetic Volt Lime Slash: 28px width, `#C7F36B`
  - Clear Space: Minimum 24px padding margin on all quadrants
  - Default Nav Sizing: 36px × 36px; Splash / Hero: 96px – 128px

### 5.2 Tactical Iconography System
- **Asset ID**: `{{DATA:IMAGE:IMAGE_2}}`
- **Grid & Dimensions**: 24px base bounding box within 48px touch targets
- **Stroke Weights**: 1.5px – 2px (subtle telemetry), 3px (primary functional), 4px (structural framing)
- **Corner Radii**: 2px interior / 4px intermediate / 12px card containers
- **Key Domain Icons**:
  1. `Biometric RFID Pulse`: Dual concentric rings with centered pulse dot
  2. `Metabolic VO2`: Continuous ECG / lactate wave frequency path
  3. `Cryo 4°C`: 8-point geometric crystalline geometry with core ring
  4. `Eleiko Platform`: Calibrated competition barbell with precision collars
  5. `Hard Lockout`: Biometric padlock with crimson indicator
  6. `BLE Telemetry`: Sensor antenna tower with broadcast node rings
  7. `Combat Cage`: Heavy hexagonal arena perimeter wireframe
  8. `Nominal Shield`: Perimeter security crest with verification check
  9. `Force Plates`: Quad-quadrant strain gauge tare matrix
  10. `Turnstile Gate`: Directional passage chevron with access barrier

### 5.3 Architectural & Portrait Photography
- **Flagship Facility Interior (`{{DATA:IMAGE:IMAGE_3}}`)**:
  - SCBD Flagship Subterranean Arena: Raw polished concrete floors, matte black Eleiko platforms, linear neon volt lime architectural LED conduits, cold desaturated shadows (5200K) with electric highlights.
- **Elite Faculty Editorial Portraiture (`{{DATA:IMAGE:IMAGE_4}}`)**:
  - Elite Performance Trainer: Studio rim lighting, low-key dark industrial texture, athletic discipline, matte carbon technical apparel with subtle volt piping.

---

## 6. COMPONENT SPECIFICATIONS

### 6.1 Buttons & Interactive CTAs
- **Primary Kinetic Action**:
  - Height: 44px (Desktop) / 48px (Mobile)
  - Background: `#C7F36B` (Volt Lime)
  - Text: `#0C0E11` (Deep Obsidian), Bebas Neue 16px / Inter 14px SemiBold
  - Border Radius: 4px
  - Hover: Background `#B5E358`, Box Shadow `0 0 16px rgba(199, 243, 107, 0.35)`
- **Secondary Ghost Action**:
  - Height: 44px
  - Background: `rgba(22, 25, 31, 0.75)`
  - Border: 1px solid `#2A2F3A`
  - Text: `#F1F3F5`
  - Hover: Border `#C7F36B`, Text `#C7F36B`

### 6.2 Form Inputs & Validation
- **Height**: 48px standard input height
- **Default State**: Surface `#111317`, Border `1px solid #1E2229`, Text `#F1F3F5`
- **Focus State**: Border `1px solid #C7F36B`, Glow `0 0 0 2px rgba(199, 243, 107, 0.15)`
- **Error State**: Border `1px solid #EF4444`, Glow `0 0 0 2px rgba(239, 68, 68, 0.20)`

### 6.3 Operational Badges & Lifecycle Indicators
- **Active / Granted**: Background `rgba(199, 243, 107, 0.12)`, Text `#C7F36B`, Border `1px solid rgba(199, 243, 107, 0.30)`
- **Pending / Audit**: Background `rgba(245, 158, 11, 0.12)`, Text `#F59E0B`, Border `1px solid rgba(245, 158, 11, 0.30)`
- **Critical / Lockout**: Background `rgba(239, 68, 68, 0.12)`, Text `#EF4444`, Border `1px solid rgba(239, 68, 68, 0.30)`

---
*END OF SPECIFICATION // Alfito Gym CLUB OPERATIONS PLATFORM*
