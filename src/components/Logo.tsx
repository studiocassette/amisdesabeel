import { cn } from "@/lib/utils";

interface LogoProps {
  className?: string;
  size?: 'sm' | 'md' | 'lg';
}

export const Logo = ({ className, size = 'md' }: LogoProps) => {
  const sizeClasses = {
    sm: 'h-8 w-8',
    md: 'h-10 w-10',
    lg: 'h-14 w-14',
  };

  return (
    <div className={cn("flex items-center gap-3", className)}>
      <svg
        viewBox="0 0 48 48"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        className={cn(sizeClasses[size], "flex-shrink-0")}
      >
        {/* Olivier stylisé - symbole de paix */}
        <circle cx="24" cy="24" r="22" className="fill-primary/10 stroke-primary" strokeWidth="2" />
        
        {/* Branche d'olivier */}
        <path
          d="M24 38 C24 38 24 28 24 20 C24 14 20 10 16 10"
          className="stroke-primary"
          strokeWidth="2"
          strokeLinecap="round"
          fill="none"
        />
        
        {/* Feuilles d'olivier */}
        <ellipse cx="18" cy="12" rx="4" ry="2" className="fill-primary" transform="rotate(-30 18 12)" />
        <ellipse cx="14" cy="16" rx="4" ry="2" className="fill-primary" transform="rotate(-45 14 16)" />
        <ellipse cx="20" cy="18" rx="4" ry="2" className="fill-primary" transform="rotate(15 20 18)" />
        <ellipse cx="16" cy="22" rx="4" ry="2" className="fill-primary" transform="rotate(-20 16 22)" />
        <ellipse cx="22" cy="24" rx="4" ry="2" className="fill-primary" transform="rotate(30 22 24)" />
        <ellipse cx="18" cy="28" rx="4" ry="2" className="fill-primary" transform="rotate(-15 18 28)" />
        <ellipse cx="24" cy="30" rx="4" ry="2" className="fill-primary" transform="rotate(20 24 30)" />
        
        {/* Olives */}
        <circle cx="28" cy="22" r="2.5" className="fill-primary" />
        <circle cx="30" cy="28" r="2" className="fill-primary" />
        
        {/* Deuxième branche */}
        <path
          d="M24 38 C24 38 24 28 24 20 C24 14 28 10 32 10"
          className="stroke-primary"
          strokeWidth="2"
          strokeLinecap="round"
          fill="none"
        />
        
        <ellipse cx="30" cy="12" rx="4" ry="2" className="fill-primary" transform="rotate(30 30 12)" />
        <ellipse cx="34" cy="16" rx="4" ry="2" className="fill-primary" transform="rotate(45 34 16)" />
        <ellipse cx="28" cy="18" rx="4" ry="2" className="fill-primary" transform="rotate(-15 28 18)" />
        <ellipse cx="32" cy="22" rx="4" ry="2" className="fill-primary" transform="rotate(20 32 22)" />
      </svg>
      
      <div className="flex flex-col">
        <span className={cn(
          "font-semibold leading-tight text-foreground",
          size === 'sm' && "text-sm",
          size === 'md' && "text-base",
          size === 'lg' && "text-xl"
        )}>
          Amis de Sabeel
        </span>
        <span className={cn(
          "text-primary font-medium",
          size === 'sm' && "text-xs",
          size === 'md' && "text-sm",
          size === 'lg' && "text-base"
        )}>
          France
        </span>
      </div>
    </div>
  );
};
