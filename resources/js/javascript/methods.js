function numberFormater(value, locale) {
  let k = null;
  let m = null;
  if (locale == "ar") {
    k = "ألف";
    m = "مليون";
  } else {
    k = "k";
    m = "m";
  }
  if (value < 1000) {
    return value;
  } else {
    if (value >= 1000 && value < 1000000) {
      let result = value / 1000;

      return Math.round(result * 10) / 10 + " " + k;
    } else if (value >= 1000000) {
      let result = value / 1000000;

      return Math.round(result * 10) / 10 + " " + m;
    }
  }
}

function getTextDirection(locale) {
  if (locale == "ar") {
    return "rtl";
  } else {
    return "ltr";
  }
}

function setPageTitle(title) {
  document.title = title;
}

function textFilter(text) {
  let r = text.match(
    /anal|anus|arse|ass|ass fuck|ass hole|assfucker|asshole|assshole|bastard|bitch|black cock|bloody hell|boong|cock|cockfucker|cocksuck|cocksucker|coon|coonnass|crap|cunt|cyberfuck|damn|darn|dick|dirty|douche|dummy|erect|erection|erotic|escort|fag|faggot|fuck|Fuck off|fuck you|fuckass|fuckhole|god damn|gook|hard core|hardcore|homoerotic|hore|lesbian|lesbians|mother fucker|motherfuck|motherfucker|negro|nigger|orgasim|orgasm|penis|penisfucker|piss|porn|porno|pornography|pussy|retard|sadist|sex|sexy|shit|slut|bitch|suck|tits|viagra|whore|xxx|كس|كس أمك|كس امك|كس أبوك|كس ابوك|قحبة|شرموطة|عاهرة|سحاق|سحاقية|لوطي|شرموط|قحيب|كسمك|يا خنيث|مخنث|ممحون|ممحونة|مخنثة|مخنون|زبي|كسي|زب|مص|مص زبي|الحس كسي|خنيثة|مخنوثة|مخنوثه|خنيثة/gi
  );
  let resultText = "";
  if (r) {
    resultText = text.replace(r, "***");
    return resultText;
  }
  return text;
}

function validateEmail(email) {
  return email.match(
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  );
}

function validatePassword(password) {
  let strength = 0;

  if (password.match(/[a-z]+/)) {
    strength++;
  }
  if (password.match(/[A-Z]+/)) {
    strength++;
  }
  if (password.match(/[0-9]+/)) {
    strength++;
  }
  if (password.match(/[$@#&!]+/)) {
    strength++;
  }

  if (password.length == 0) {
    return false;
  }
  if (password.length < 8) {
    return false;
  }

  if (password.length >= 8) {
    return strength;
  }
}
export {
  numberFormater,
  getTextDirection,
  validatePassword,
  textFilter,
  setPageTitle,
  validateEmail,
};
